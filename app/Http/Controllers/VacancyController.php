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
        if (auth()->check() && auth()->user()->role == 'werkgever') { // Explicitly check if user is logged in
            return $this->indexForEmployer();
        } elseif (auth()->check() && auth()->user()->role == 'werknemer') { // Explicitly check if user is logged in
            return $this->indexForEmployee();
        }
        //return response()->view('default-view'); // Or redirect to login/register if not authenticated
        return redirect()->route('login'); // Example redirect to login

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
        $userId = auth()->id(); // Get the logged-in user's ID

        // Fetch available vacancies that the user hasn't applied for
        $vacancies = Vacancy::where('status', 'available')
            ->whereNotIn('id', function ($query) use ($userId) {
                $query->select('vacancy_id')
                    ->from('applications')
                    ->where('user_id', $userId);
            })
            ->get();

        return view('vacancies.employee', compact('vacancies'))->with('userRole', auth()->user()->role);    }






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

    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id); // Fetch the vacancy details
        return view('vacancy.show', compact('vacancy'));
    }
}


