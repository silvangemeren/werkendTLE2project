<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    public function change_status()
    {
        $vacancies = Vacancy::where('status', 'pending')->get();
        return view('change_vacancy_status', ['vacancies' => $vacancies]);
    }

    public function status($id)
    {
        // Haal de vacature op
        $vacancy = Vacancy::findOrFail($id);

        // Toggle status: bijvoorbeeld van 'pending' naar 'available'
        $vacancy->status = $vacancy->status === 'pending' ? 'available' : 'pending';

        // Sla de wijziging op
        $vacancy->save();

        // Redirect terug naar de lijst met vacatures met een succesbericht
        return redirect()->route('vacancy.index')->with('success');
    }
}

