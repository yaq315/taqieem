<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:teacher,parent',
        ]);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('success', 'Registered successfully');
    }

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['login' => 'Email is not registered']);
    }

    if (Hash::check($request->password, $user->password)) {
        Auth::login($user);
        
        if ($user->role == 'teacher') {
            return redirect('/dashboard');
        }
        return redirect('/ratings');
    }

    return back()->withErrors(['login' => 'Incorrect password']);
}


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

