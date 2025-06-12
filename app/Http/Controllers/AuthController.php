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
            'role' => 'required|in:manager,parent',
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
        
        if ($user->role == 'manager') {
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


    // Display the list of parents
public function parents()
{
    $parents = User::where('role', 'parent')->paginate(10);
    return view('dashboard.users.parents.index', compact('parents'));
}


// Show the edit form for a parent
public function editParent(User $user)
{
    return view('dashboard.users.parents.edit', compact('user'));
}

// Update parent data
public function updateParent(Request $request, User $user)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required|unique:users,phone,' . $user->id,
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update($request->all());
    return redirect()->route('users.parents')->with('success', 'Parent information updated successfully.');
}


// عرض صفحة البروفايل (كما عندك)
public function profile()
{
    $user = auth()->user();
    return view('dashboard.profile.show', compact('user'));
}

// عرض صفحة التعديل مع بيانات المستخدم
public function editProfile()
{
    $user = auth()->user();
    return view('dashboard.profile.edit', compact('user'));
}

// تحديث بيانات المستخدم بعد التحقق من الصحة
public function updateProfile(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        // ممكن تضيف فحص لباقي الحقول لو حبيت
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
}




}

