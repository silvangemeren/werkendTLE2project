<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    /**
     * Search for vacancies.
     */
    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'vacancy' => 'nullable|string|max:255',
        ]);

        $search = $validatedData['vacancy'];

        $searchedVacancies = Vacancy::withCount('applications')
            ->where('status', 'available')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%")
                        ->orWhere('function', 'LIKE', "%{$search}%");
                });
            })
            ->get();

        return view('vacancies.employee', compact('searchedVacancies'))->with('userRole', Auth::user()->role);
    }

    /**
     * Index method to route users based on role.
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 'werkgever') {
            return $this->indexForEmployer();
        } elseif (Auth::check() && Auth::user()->role == 'werknemer') {
            return $this->indexForEmployee();
        }
        return redirect()->route('login');
    }

    /**
     * Display vacancies for employers.
     */
    public function indexForEmployee()
    {
        $userId = Auth::id(); // Get the ID of the logged-in user

        // Fetch all available vacancies
        $vacancies = Vacancy::where('status', 'available')->get();

        // Add application counts manually
        foreach ($vacancies as $vacancy) {
            $vacancy->total_applications = Application::where('vacancy_id', $vacancy->id)->count();
        }
        // Fetch applied vacancy IDs for the logged-in user to check their applications
        $appliedVacancyIds = Application::where('user_id', $userId)
            ->pluck('vacancy_id')
            ->toArray();

        return view('vacancies.employee', compact('vacancies', 'appliedVacancyIds'));
    }


    public function indexForEmployer()
    {
        $employer_vacancies = Vacancy::where('employer_id', Auth::id())
            ->withCount('applications') // Adds applications_count to each vacancy
            ->get();

        return view('vacancies.employer', compact('employer_vacancies'));
    }





    /**
     * Show the form for creating a new vacancy.
     */
    public function create()
    {
        return view('vacancies.create');
    }

    /**
     * Store a newly created vacancy.
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
            'work_hours' => 'required|integer|min:1',
            'imageUrl' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'salary' => 'required|integer|min:0',
        ]);

        $imagePath = $request->file('imageUrl')->store('images', 'public');

        $location = implode(', ', array_filter([
            $validated['adres'], $validated['stad'], $validated['postcode'], $validated['land'],
        ]));

        Vacancy::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'location' => $location,
            'function' => $validated['function'],
            'work_hours' => $validated['work_hours'],
            'salary' => $validated['salary'],
            'status' => 'available',
            'imageUrl' => $imagePath,
            'employer_id' => Auth::id(),
        ]);

        return redirect()->route('vacancies.employer')->with('success', 'Vacature succesvol aangemaakt.');
    }

    /**
     * Apply for a specific vacancy.
     */
    public function apply($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $userId = Auth::id();

        // Check for existing application
        if (Application::where('user_id', $userId)->where('vacancy_id', $vacancy->id)->exists()) {
            return redirect()->route('vacancies.employee')->with('error', 'Je hebt al gesolliciteerd op deze vacature.');
        }

        // Create application
        Application::create([
            'user_id' => $userId,
            'vacancy_id' => $vacancy->id,
            'status' => 'submitted',
            'applied_at' => now(),
        ]);

        return redirect()->route('vacancies.employee')->with('success', 'Je hebt succesvol gesolliciteerd!');
    }

    /**
     * Show a single vacancy.
     */
    /**
     * Show a single vacancy with applicant's queue position.
     */
    public function show($id)
    {
        $vacancy = Vacancy::withCount('applications')->findOrFail($id);
        $userId = Auth::id();

        // Fetch user's application and count the applicants ahead
        $userApplication = Application::where('user_id', $userId)
            ->where('vacancy_id', $id)
            ->first();

        $queuePosition = null;

        if ($userApplication) {
            $queuePosition = Application::where('vacancy_id', $id)
                ->where('applied_at', '<', $userApplication->applied_at)
                ->count();
        }

        return view('vacancy.show', compact('vacancy', 'queuePosition'));
    }


    /**
     * Edit a vacancy.
     */
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        if ($vacancy->employer_id !== Auth::id()) {
            return redirect()->route('vacancies.employer');
        }

        return view('vacancies.edit', compact('vacancy'));
    }

    /**
     * Update a vacancy.
     */
    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'work_hours' => 'required|integer|min:1',
            'salary' => 'required|integer|min:0',
            'imageUrl' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imageUrl')) {
            $imagePath = $request->file('imageUrl')->store('images', 'public');
            $vacancy->imageUrl = $imagePath;
        }

        $vacancy->update($validated);

        return redirect()->route('vacancies.employer')->with('success', 'Vacature succesvol bijgewerkt.');
    }

    /**
     * Delete a vacancy.
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        if ($vacancy->employer_id !== Auth::id()) {
            return redirect()->route('vacancies.employer');
        }

        $vacancy->delete();

        return redirect()->route('vacancies.employer')->with('success', 'Vacature succesvol verwijderd.');
    }
}
