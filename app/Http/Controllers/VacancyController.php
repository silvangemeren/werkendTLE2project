<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $vacancies = Vacancy::all();
        return view('vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adres' => 'required|string|max:255',
            'stad' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'land' => 'required|string|max:255',
            'function' => 'required|string|max:255',
            'work_hours' => 'required|integer|min:1',
            'salary' => 'required|integer|min:0',
            'status' => 'required',
            'employer_id' => 'required',
            'imageUrl' => 'required',
        ]);
        $location = "{$validatedData['adres']}, {$validatedData['stad']}, {$validatedData['postcode']}, {$validatedData['land']}";
        $image = $validatedData['image'];

        $saveImage = $request->file('image')->store('images', 'public');

        $vacancy = new Vacancy();
        $vacancy->title = $validatedData['title'];
        $vacancy->description = $validatedData['description'];
        $vacancy->location = $location;
        $vacancy->funcition = $validatedData['function'];
        $vacancy->work_hours = $validatedData['work_hours'];
        $vacancy->salary = $validatedData['salary'];
        $vacancy->status = 'active';
        $vacancy->employer_id = '1';
        $vacancy->imageUrl = $saveImage;
        $vacancy->save();

        $vacancy->imageUrl = $validatedData['image'];
        $image = $vacancy->imageUrl;

        return redirect()->route('vacancy.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('vacancies.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
