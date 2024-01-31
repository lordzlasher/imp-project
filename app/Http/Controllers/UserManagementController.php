<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;



class UserManagementController extends Controller
{
    public function index()
    {
        return view('user-management.index', ['users' => User::get()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('user-management.index')->with('success', 'User telah ditambahkan.');
    }

    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('user-management.index')->with('danger', 'User telah dihapus.');
    }
}
