<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class EmployerRegistrationController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register.employer');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'b_date' => ['required', 'date'],
            'city' => ['required', 'string', 'max:255'],
            'company_id' => ['nullable'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'b_date' => $validated['b_date'],
            'city' => $validated['city'],
            'company_id' => isset($validated['company_id']) ? $validated['company_id'] : null, // Optioneel veld
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'werkgever',
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }



}
