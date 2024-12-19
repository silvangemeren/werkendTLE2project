<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function inbox()
    {
        $userId = auth()->id(); // Huidige ingelogde gebruiker ophalen

        // Haal alle vacatures op waarvoor de werknemer heeft gesolliciteerd
        $appliedVacancies = DB::table('applications')
            ->join('vacancies', 'applications.vacancy_id', '=', 'vacancies.id')
            ->where('applications.user_id', $userId)
            ->select('vacancies.*', 'applications.id as application_id')
            ->get();

        return view('inbox', compact('appliedVacancies')); // Verzend de gegevens naar een nieuwe inbox-blade
    }

    public function unapply($id)
    {
        // Verwijder de sollicitatie van de werknemer
        DB::table('applications')->where('id', $id)->delete();

        return redirect()->route('inbox')->with('success', 'Je hebt je succesvol afgemeld voor de vacature.');
    }
}
