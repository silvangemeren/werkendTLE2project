<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete(); // verwijderen user
        return redirect()->route('admin.users.index');
    }
    public function change_status()
    {
        $vacancies_admin = Vacancy::where('status', 'pending')->get();
        return view('change_vacancy_status', ['vacancies_admin' => $vacancies_admin]);
    }

    public function status($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        if ($vacancy->status === 'pending') {
            $vacancy->status = 'available';
        }

        $vacancy->save();

        return redirect()->route('change_status');
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
