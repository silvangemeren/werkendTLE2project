<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy; // Import your Vacancy model

class DashboardController extends Controller
{
    public function showDashboard(): \Illuminate\View\View
    {
        // Use a private method for fetching data
        $vacancies = $this->fetchAllVacancies();

        // Return the view with the data
        return view('dashboard', compact('vacancies'));
    }

    /**
     * Fetch all vacancies.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function fetchAllVacancies(): \Illuminate\Database\Eloquent\Collection
    {
        return Vacancy::all();
    }
}
