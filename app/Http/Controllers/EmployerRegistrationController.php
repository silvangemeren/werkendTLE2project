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
            'company_id' => ['exists:companies,id'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => '',
            'first_name' => '',
            'last_name' => '',
            'b_date' => '',
            'city' => '',
            'company_id' => '',
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'werkgever',
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }



}
