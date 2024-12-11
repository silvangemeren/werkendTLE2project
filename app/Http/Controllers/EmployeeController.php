<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee'); // Replace with your actual view name
    }

    public function apply($id)
    {
        $user = auth()->user();
        $vacancy = Vacancy::findOrFail($id);

        // Check if user has already applied
        if ($vacancy->applications()->where('user_id', $user->id)->exists()) {
            return redirect()->route('employee-page')->with('error', 'Je hebt al gesolliciteerd op deze vacature.');
        }

        // Create new application
        $vacancy->applications()->create([
            'user_id' => $user->id,
            'applied_at' => now(),
            'status' => 'submitted',
        ]);

        return redirect()->route('employee-page')->with('success', 'Je sollicitatie is succesvol ingediend.');
    }

}
