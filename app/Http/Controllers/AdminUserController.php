<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user)
    {
// edit form laten zien van een user
        return view('admin.users.edit', compact('user')); //zet variabele user om in een array en zorgt dat deze gegevens beschikbaar is in de view
    }

    public function update(Request $request, User $user)
    {
// valideren en update van user details
        $request->validate([ // controleert of de waarden aan bepaalde regels voldoen
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            ]);

        $user->update($request->only('name', 'email')); // update van user details //

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete(); // verwijderen user
        return redirect()->route('admin.users.index'); // redirect naar de user list na verwijdering
    }
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
        $vacancy->status = $vacancy->status === 'pending' ? 'Beschikbaar' : 'pending';

        // Sla de wijziging op
        $vacancy->save();

        // Redirect terug naar de lijst met vacatures met een succesbericht
        return redirect()->route('vacancy.index')->with('success');
    }
}

//    public function activate(User $user)
//    {
//        $user->status = 1;
//        $user->save();
//
//        return redirect()->route('admin.users.index');
//    }
//
//    public function deactivate(User $user)
//    {
//        $user->status = 0;
//        $user->save();
//
//        return redirect()->route('admin.users.index');
//    }
//}
