<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class AdminVacaturesController extends Controller
{
    public function index()
    {
        $vacatures = Vacancy::all();

        return view('admin.vacatures.index', compact('vacatures'));
    }



    public function create()
    {
        $vacatures = Vacancy::all();
        return view('admin.vacatures.create', compact('vacatures'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'vacatures' => 'required|string|max:255',
        ]);

        Vacancy::create([
            'vacatures' => $request->vacatures,
        ]);

        return redirect()->route('admin.vacatures.index')->with('success', 'Vacature added successfully.');
    }



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


    public function destroy(Vacancy $vacatures)
    {
        $vacatures->delete();
        return redirect()->route('admin.vacatures.index')->with('success', 'Vacature deleted successfully.');
    }
}
