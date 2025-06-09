<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\User;

class UserControllwe extends Controller
{
        public function index()
    {
        // $users = User::paginate(10);
        // return view('admin.users.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('admin.users.create');
    // }
    //     public function store(Request $request)
    // {

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6',
    //         'role' => 'required|in:admin,user',
    //     ]);
    //     User::create([
    //         'id' => $request->id,
    //         'name' => $request->name,
    //         'role' => $request->role,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //     ]);
    //     return redirect('users');
    // }
}
