<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Contact;
use App\Models\School;



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

    if ($user->role == 'admin') {
        return redirect('/dashboard');
    } elseif ($user->role == 'manager') {
        return redirect('/dashboard');
    } else {
        return redirect('/ratings');
    }
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
    $managers = User::where('role', 'manager')->get();

    return view('dashboard.users.parents.index', compact('parents', 'managers'));
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


public function managers()
{
    $managers = User::where('role', 'manager')->paginate(10);

    $schools = \App\Models\School::withCount('ratings')
        ->withAvg('ratings', 'overall_rating')
        ->having('ratings_count', '>', 0)
        ->orderByDesc('ratings_avg_overall_rating')
        ->limit(5)
        ->get();

    $parents = User::where('role', 'parent')->get();

    $contacts = Contact::latest()->paginate(10);

    // قم بإنشاء $topSchools من نفس بيانات $schools أو حسب المطلوب، مثلاً:
    $topSchools = $schools;  // أو حسب المنطق المطلوب

    return view('dashboard.users.managers.index', compact('managers', 'schools', 'parents', 'contacts', 'topSchools'));
}



public function createManager()
{
    $schools = School::all();

    // مثلاً يمكنك إعادة حساب $topSchools كما في دالة managers
    $topSchools = School::withCount('ratings')
        ->withAvg('ratings', 'overall_rating')
        ->having('ratings_count', '>', 0)
        ->orderByDesc('ratings_avg_overall_rating')
        ->limit(5)
        ->get();

    $parents = User::where('role', 'parent')->get();
    $managers = User::where('role', 'manager')->paginate(10);
    $contacts = Contact::latest()->paginate(10);

    return view('dashboard.users.managers.create', compact('schools', 'parents', 'managers', 'contacts', 'topSchools'));
}


public function storeManager(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'required|unique:users',
        'password' => 'required|min:6',
        'role' => 'required|in:manager',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect()->route('users.managers')->with('success', 'Manager added successfully.');
}


public function editManager(User $user)
{
    if ($user->role !== 'manager') {
        abort(403);
    }
    return view('dashboard.users.managers.edit', compact('user'));
}

public function updateManager(Request $request, User $user)
{
    if ($user->role !== 'manager') {
        abort(403);
    }

    $request->validate([
        'name' => 'required',
        'phone' => 'required|unique:users,phone,' . $user->id,
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update($request->all());

    return redirect()->route('users.parents')->with('success', 'Manager updated successfully.');
}



}

