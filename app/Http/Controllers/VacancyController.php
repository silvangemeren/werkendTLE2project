<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'vacancy' => 'nullable|string|max:255',
        ]);

        $search = $validatedData['vacancy'];

        if ($search) {
            $searchedVacancies = Vacancy::where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('function', 'LIKE', "%{$search}%");
            })
                ->where('status', '=', 'available')
                ->get();

        } else {
            $searchedVacancies = Vacancy::where('status', '=', 'available')->get();
        }

        $userId = auth()->id(); // Get the logged-in user's ID

        // Get the list of vacancy IDs the user has already applied for
        $appliedVacancyIds = \DB::table('applications')
            ->where('user_id', $userId)
            ->pluck('vacancy_id')
            ->toArray();

        return view('vacancies.employee', compact('searchedVacancies', 'appliedVacancyIds'))->with('userRole', auth()->user()->role);    }

public function guestSearch(Request $request){
    $validatedData = $request->validate([
        'vacancy' => 'nullable|string|max:255',
    ]);

    $guestSearch = $validatedData['vacancy'];

    if ($guestSearch) {
        $searchedGuestVacancies = Vacancy::where(function ($query) use ($guestSearch) {
            $query->where('title', 'LIKE', "%{$guestSearch}%")
                ->orWhere('description', 'LIKE', "%{$guestSearch}%")
                ->orWhere('function', 'LIKE', "%{$guestSearch}%");
        })
            ->where('status', '=', 'available')
            ->get();
    } else {
        $searchedGuestVacancies = Vacancy::where('status', '=', 'available')->get();
    }

    return view('vacancies.guest', compact('searchedGuestVacancies'));
}

    public function index()
    {
        return redirect()->route('login'); // Example redirect to login

    }
    /**
     * Display a listing of vacancies for the authenticated employer.
     */
    public function indexForEmployer()
    {
        if (auth()->check() && auth()->user()->role == 'werknemer') {
            return $this->indexForEmployee();
        }
        if (auth()->check() && auth()->user()->role == 'admin') {
            return view('admin.admin-dashboard');
        }

        // Fetch vacancies belonging to the authenticated employer
        $employer_vacancies = Vacancy::where('employer_id', auth()->id())
            ->withCount('applications') // Add the count of applications
            ->get();

        // Return the vacancies.employer view with the updated vacancies data
        return view('vacancies.employer', compact('employer_vacancies'));
    }


    /**
     * Display a listing of vacancies available for employees to apply for.
     */
    public function indexForEmployee()
    {if (auth()->check() && auth()->user()->role == 'werkgever') { // Explicitly check if user is logged in
            return $this->indexForEmployer();
        }
        if (auth()->check() && auth()->user()->role == 'admin') { // Explicitly check if user is logged in
            return view('admin.admin-dashboard');
        }

        $userId = auth()->id(); // Get the logged-in user's ID

        // Fetch all available vacancies
        $vacancies = Vacancy::where('status', 'available')->get();
        // Fetch available vacancies
        $employeeVacancies = Vacancy::where('status', '=', 'available')->get();

        // Add application counts manually
        foreach ($vacancies as $vacancy) {
            $vacancy->total_applications = Application::where('vacancy_id', $vacancy->id)->count();
        }
        // Fetch applied vacancy IDs for the logged-in user to check their applications
        $appliedVacancyIds = Application::where('user_id', $userId)
            ->pluck('vacancy_id')
            ->toArray();

        return view('vacancies.employee', compact('employeeVacancies', 'appliedVacancyIds'))->with('userRole', auth()->user()->role);
    }

    public function indexForGuest(){
        return view('vacancies.guest');
    }







    /**
     * Show the form for creating a new vacancy.
     */
    public function create()
    {
        return view('vacancies.create');
    }

    /**
     * Store a newly created vacancy in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adres' => 'required|string|max:255',
            'stad' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'land' => 'required|string|max:255',
            'function' => 'required|string|max:255',
            'work_hours' => 'required|string|min:1',
            'imageUrl' => 'required|file|mimes:jpeg,png,jpg,gif|max:4048',
            'salary' => 'required|string|min:0',
            'employer_id' => 'nullable'
        ]);

        $imagePath = $request->file('imageUrl')->store('images', 'public');

        $location = implode(', ', array_filter([
            $validated['adres'],
            $validated['stad'],
            $validated['postcode'],
            $validated['land'],
        ]));

        Vacancy::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'location' => $location,
            'function' => $validated['function'],
            'work_hours' => $validated['work_hours'],
            'salary' => $validated['salary'],
            'status' => 'pending',
            'imageUrl' => $imagePath,
            'employer_id' => isset($validated['employer_id']) ? $validated['employer_id'] : (auth()->check() ? auth()->id() : null),
        ]);

        return redirect()->route('vacancies.employer')->with('success', 'Vacature succesvol aangemaakt.');
    }

    /**
     * Apply for a specific vacancy.
     */

    /**
     * Show a single vacancy.
     */
    /**
     * Show a single vacancy with applicant's queue position.
     */
    public function show($id)
    {
        $vacancy = Vacancy::withCount('applications')->findOrFail($id);

        // Retrieve the authenticated user's ID
        $userId = Auth::id();

        // Check if the user has already applied for the vacancy
        $has_applied = Application::where('user_id', $userId)
            ->where('vacancy_id', $id)
            ->exists();

        // Fetch user's application and count the applicants ahead (optional)
        $queuePosition = null;
        if ($has_applied) {
            $userApplication = Application::where('user_id', $userId)
                ->where('vacancy_id', $id)
                ->first();
            $queuePosition = Application::where('vacancy_id', $id)
                ->where('applied_at', '<', $userApplication->applied_at)
                ->count();
        }

        return view('vacancy.show', compact('vacancy', 'queuePosition', 'has_applied'));
    }




    /**
     * Edit a vacancy.
     */
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        if ($vacancy->employer_id !== auth()->id()) {
            return redirect()->route('vacancies.employer');
        }

        $locationParts = explode(', ', $vacancy->location);

        return view('vacancies.edit', compact('vacancy'))->with([
            'adres' => $locationParts[0] ?? '',
            'stad' => $locationParts[1] ?? '',
            'postcode' => $locationParts[2] ?? '',
            'land' => $locationParts[3] ?? '',
        ]);
    }

    /**
     * Update the specified vacancy in storage.
     */
    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adres' => 'required|string|max:255',
            'stad' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'land' => 'required|string|max:255',
            'function' => 'required|string|max:255',
            'work_hours' => 'required|string|min:1',
            'imageUrl' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'salary' => 'required|string|min:0',
        ]);

        if ($request->hasFile('imageUrl')) {
            $imagePath = $request->file('imageUrl')->store('images', 'public');
            $vacancy->imageUrl = $imagePath;
        }

        $location = implode(', ', array_filter([
            $validated['adres'],
            $validated['stad'],
            $validated['postcode'],
            $validated['land'],
        ]));

        $vacancy->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'location' => $location,
            'function' => $validated['function'],
            'work_hours' => $validated['work_hours'],
            'salary' => $validated['salary'],
            'status' => 'pending',
        ]);

        return redirect()->route('vacancies.employer')->with('success', 'Vacature succesvol bijgewerkt.');
    }

    /**
     * Apply for a specific vacancy.
     */
    public function apply($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $userId = auth()->id(); // Get the authenticated user's ID

        // Check if the user has already applied to this vacancy
        $existingApplication = \DB::table('applications')
            ->where('user_id', $userId)
            ->where('vacancy_id', $vacancy->id)
            ->first();

        if ($existingApplication) {
            return redirect()->route('vacancy.show', ['vacancy' => $vacancy->id])->with('success', 'Je hebt succesvol gesolliciteerd!');
        }

        // Create a new application
        \DB::table('applications')->insert([
            'user_id' => $userId,
            'vacancy_id' => $vacancy->id,
            'status' => 'submitted',
            'applied_at' => now(),
        ]);

        return redirect()->route('vacancy.show', ['vacancy' => $vacancy->id])->with('success', 'Je hebt succesvol gesolliciteerd! Zie uw inbox voor een overzicht van uw sollicitaties.');    }


    /**
     * Remove the specified vacancy from storage.
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        if ($vacancy->employer_id !== auth()->id()) {
            return redirect()->route('vacancies.employer');
        }


        $vacancy->delete();

        return redirect()->route('vacancies.employer')->with('success', 'Vacature succesvol verwijderd.');
    }

}


