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



    public function edit(Vacancy $vacatures)
    {
        return view('admin.vacatures.edit', compact('vacatures'));
    }

    public function update(Request $request, Vacancy $vacatures)
    {
        $request->validate([
            'vacatures' => 'required|string|max:255',
        ]);

        $vacatures->update([
            'vacatures' => $request->vacatures,
        ]);

        return redirect()->route('admin.vacatures.index')->with('success', 'Vacature updated successfully.');
    }


    public function destroy(Vacancy $vacatures)
    {
        $vacatures->delete();
        return redirect()->route('admin.vacatures.index')->with('success', 'Vacature deleted successfully.');
    }
}
