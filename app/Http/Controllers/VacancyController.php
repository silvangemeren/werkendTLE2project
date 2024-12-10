<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancies = Vacancy::where('status', 'available')->get();

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
//       dd($request->all());
//        $request = $request->validate([
//            'title' => 'required|string|max:255',
//            'description' => 'nullable|string',
//            'adres' => 'required|string|max:255',
//            'stad' => 'required|string|max:255',
//            'postcode' => 'required|string|max:20',
//            'land' => 'required|string|max:255',
//            'function' => 'required|string|max:255',
//            'work_hours' => 'required|integer|min:1',
//            'imageUrl' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
//            'salary' => 'required|integer|min:0',
//        ]);

        $request->file('imageUrl')->store('images', 'public');
        $imagePath = $request->file('imageUrl')->store('images', 'public');

        $location = implode(', ', array_filter([
            $request['adres'],
            $request['stad'],
            $request['postcode'],
            $request['land']
        ]));

        $vacancy = new Vacancy();
        $vacancy->title = $request['title'];
        $vacancy->description = $request['description'];
        $vacancy->location = $location;
        $vacancy->function = $request['function'];
        $vacancy->work_hours = $request['work_hours'];
        $vacancy->salary = $request['salary'];
        $vacancy->status = 'available';
        $vacancy->imageUrl = $imagePath;
        $vacancy->save();


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
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $locationParts = explode(', ', $vacancy->location);

        $adres = $locationParts[0] ?? '';
        $stad = $locationParts[1] ?? '';
        $postcode = $locationParts[2] ?? '';
        $land = $locationParts[3] ?? '';
        return view('vacancies.edit', compact('vacancy'))->with([
            'adres' => $locationParts[0],
            'stad' => $locationParts[1],
            'postcode' => $locationParts[2],
            'land' => $locationParts[3],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $request->file('imageUrl')->store('images', 'public');
        $imagePath = $request->file('imageUrl')->store('images', 'public');

        $location = implode(', ', array_filter([
            $request['adres'],
            $request['stad'],
            $request['postcode'],
            $request['land']
        ]));

        $vacancy = Vacancy::find($id);
        $vacancy->title = $request['title'];
        $vacancy->description = $request['description'];
        $vacancy->location = $location;
        $vacancy->function = $request['function'];
        $vacancy->work_hours = $request['work_hours'];
        $vacancy->salary = $request['salary'];
        $vacancy->status = 'available';
        $vacancy->imageUrl = $imagePath;
        $vacancy->save();
        return redirect()->route('vacancy.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $vacancy = Vacancy::find($id);

        if (!$vacancy) {
            return redirect()->route('vacancy.index');
        }

        $vacancy->delete();

        return redirect()->route('vacancy.index');
    }

}
