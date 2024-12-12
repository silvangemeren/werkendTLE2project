<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register.employee');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => '',
            'first_name' => '',
            'last_name' => '',
            'b_date' => '',
            'city' => '',
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'werknemer',
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
