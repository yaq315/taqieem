<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
  public function index()
{
    $schools = School::with(['ratings'])
        ->withAvg('ratings as average_rating', 'overall_rating')
        ->withCount('ratings as ratings_count')
        ->paginate(20);

    return view('ratings', compact('schools'));
}

    public function show(School $school)
    {
        $school->load(['ratings' => function($query) {
            $query->latest()->with('user');
        }]);
        
        return view('ratings-single', compact('school'));
    }

    public function home()
{
    $schools = School::withCount('ratings')
        ->withAvg('ratings', 'rating')
        ->orderByDesc('ratings_count')
        ->take(6)
        ->get()
        ->map(function ($school) {
            $school->average_rating = $school->ratings_avg_rating ?? 0;
            return $school;
        });

    return view('welcome', compact('schools'));
}


    public function manage()
    {
        $schools = School::paginate(10);
        return view('dashboard.schools.index', compact('schools'));
    }

    public function create()
    {
        return view('dashboard.schools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('schools', 'public');
            $data['image'] = $imagePath;
        }

        School::create($data);
        return redirect()->route('schools.manage')->with('success', 'School added successfully');
    }

    public function edit(School $school)
    {
        return view('dashboard.schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($school->image) {
                Storage::disk('public')->delete($school->image);
            }
            
            $imagePath = $request->file('image')->store('schools', 'public');
            $data['image'] = $imagePath;
        }

        $school->update($data);
        return redirect()->route('schools.manage')->with('success', 'School updated successfully');
    }
}