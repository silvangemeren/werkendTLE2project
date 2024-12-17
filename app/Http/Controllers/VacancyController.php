<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'vacancy' => 'nullable|string|max:255',
        ]);

        $search = $validatedData['vacancy'];

        if ($search) {
            $searchedVacancies = Vacancy::where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('function', 'LIKE', "%{$search}%")
                ->where('status', 'available')
                ->get();
        } else {
            $searchedVacancies = Vacancy::all();
        }

        return view('vacancies.employee', compact('searchedVacancies'))->with('userRole', auth()->user()->role);    }


    public function index()
    {
        return redirect()->route('login'); // Example redirect to login

    }
    /**
     * Display a listing of vacancies for the authenticated employer.
     */
    public function indexForEmployer()
    {

        if (auth()->check() && auth()->user()->role == 'werknemer') { // Explicitly check if user is logged in
            return $this->indexForEmployee();
        }
        if (auth()->check() && auth()->user()->role == 'admin') { // Explicitly check if user is logged in
            return view('admin.admin-dashboard');
        }

        $employer_vacancies = Vacancy::where('employer_id', auth()->id())->get();

        return view('vacancies.employer', compact('employer_vacancies'));
    }


    /**
     * Display a listing of vacancies available for employees to apply for.
     */
    public function indexForEmployee()
    {
        if (auth()->check() && auth()->user()->role == 'werkgever') { // Explicitly check if user is logged in
            return $this->indexForEmployer();
        }
        if (auth()->check() && auth()->user()->role == 'admin') { // Explicitly check if user is logged in
            return view('admin.admin-dashboard');
        }

        $userId = auth()->id(); // Get the logged-in user's ID

        // Fetch available vacancies
        $vacancies = Vacancy::where('status', 'available')->get();

        // Get the list of vacancy IDs the user has already applied for
        $appliedVacancyIds = \DB::table('applications')
            ->where('user_id', $userId)
            ->pluck('vacancy_id')
            ->toArray();

        return view('vacancies.employee', compact('vacancies', 'appliedVacancyIds'))->with('userRole', auth()->user()->role);
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
            'employer_id' => auth()->id(),
        ]);

        return redirect()->route('vacancies.employer')->with('success', 'Vacature succesvol aangemaakt.');
    }

    /**
     * Show the form for editing the specified vacancy.
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
            return redirect()->route('vacancies.employee')->with('error', 'Je hebt al gesolliciteerd op deze vacature.');
        }

        // Create a new application
        \DB::table('applications')->insert([
            'user_id' => $userId,
            'vacancy_id' => $vacancy->id,
            'status' => 'submitted',
            'applied_at' => now(),
        ]);

        return redirect()->route('vacancies.employee')->with('success', 'Je hebt succesvol gesolliciteerd!');
    }


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

    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('vacancy.show', compact('vacancy'));
    }
}


