<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Rating;
use App\Models\User;
use App\Models\Contact;  

use Illuminate\Http\Request; 

class DashboardController extends Controller
{ 
    public function index()
    {
        $parents = User::where('role', 'parent')->paginate(10);  
        $contacts = Contact::latest()->paginate(10);
        $schools = School::withCount('ratings')
            ->withAvg('ratings', 'overall_rating')
            ->orderByDesc('ratings_avg_overall_rating')
            ->paginate(20);

        $topSchools = School::withCount('ratings')
            ->withAvg('ratings', 'overall_rating')
            ->having('ratings_count', '>', 0)
            ->orderByDesc('ratings_avg_overall_rating')
            ->limit(5)
            ->get();

        return view('dashboard.layout.dash', compact('parents', 'contacts', 'schools', 'topSchools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'mail' => $request->mail,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }

}
