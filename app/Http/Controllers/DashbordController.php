<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy; // Import your Vacancy model

class DashboardController extends Controller
{
    public function showDashboard()
    {
        // Fetch all vacancies
        $vacancies = Vacancy::all();

        // Pass the vacancies to the dashboard view
        return view('dashboard', compact('vacancies'));
    }
}
