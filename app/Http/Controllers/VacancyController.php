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

            \Log::info('Found vacancies: ' . $searchedVacancies->count());
        } else {
            $vacancies = Vacancy::all();
        }

        \Log::info('Vacancies data: ' . $searchedVacancies);

        return view('vacancies.employee', compact('searchedVacancies'));
    }


    public function index()
    {
        if (auth()->user()->role == 'werkgever') {
            return $this->indexForEmployer();
        } elseif (auth()->user()->role == 'werknemer') {
            return $this->indexForEmployee();
        }
        return response()->view('default-view');
        // Optionally, you may want to show some default view or throw an
        // exception if the role is neither 'werkgever' nor 'werknemer'
    }
    /**
     * Display a listing of vacancies for the authenticated employer.
     */
    public function indexForEmployer()
    {
        // Fetch vacancies created by the logged-in employer
        $vacancies = Vacancy::where('employer_id', auth()->id())->get();

        return view('vacancies.employer', compact('vacancies'));
    }


    /**
     * Display a listing of vacancies available for employees to apply for.
     */
    public function indexForEmployee()
    {
        $user = auth()->user();

        // Fetch all available vacancies
        $vacancies = Vacancy::where('status', 'available')
            ->get()
            ->each(function ($vacancy) use ($user) {
                $vacancy->user_has_applied = $vacancy->applications()
                    ->where('user_id', $user->id)
                    ->exists();
            });

        return view('vacancies.employee', compact('vacancies'));
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
            'work_hours' => 'required|integer|min:1',
            'imageUrl' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'salary' => 'required|integer|min:0',
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
            'status' => 'available',
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
            'work_hours' => 'required|integer|min:1',
            'imageUrl' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'salary' => 'required|integer|min:0',
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
            'status' => 'available',
        ]);

        return redirect()->route('vacancies.employer')->with('success', 'Vacature succesvol bijgewerkt.');
    }

    /**
     * Apply for a specific vacancy.
     */
    public function apply($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        auth()->user()->applications()->create([
            'vacancy_id' => $vacancy->id,
            'status' => 'pending',
        ]);

        return redirect()->route('vacancies.employee')->with('success', 'Je hebt succesvol gesolliciteerd!');
    }

    /**
     * Remove the specified vacancy from storage.
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $vacancy->delete();

        return redirect()->route('vacancies.employer')->with('success', 'Vacature succesvol verwijderd.');
    }
}
