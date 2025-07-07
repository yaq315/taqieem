<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
  use App\Models\Rating;

class SchoolController extends Controller
{
  public function index()
    {
        $schools = School::with(['ratings'])
            ->withAvg('ratings as avg_rating', 'overall_rating')  // تغيير من average_rating إلى overall_rating
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
            ->withAvg('ratings', 'overall_rating') // تغيير من rating إلى overall_rating
            ->orderByDesc('ratings_count')
            ->take(6)
            ->get()
            ->map(function ($school) {
                $school->overall_rating = $school->ratings_avg_overall_rating ?? 0;
                return $school;
            });

        return view('welcome', compact('schools'));
    }


    public function manage()
    {
        $schools = School::paginate(20);
        return view('dashboard.schools.index', compact('schools'));
    }

    public function create()
    {
        return view('dashboard.schools.create');
    }

 public function store(Request $request, School $school)
{
    $request->validate([
        'teaching_quality' => 'required|integer|min:1|max:5',
        'facilities' => 'required|integer|min:1|max:5',
        'administration' => 'required|integer|min:1|max:5',
        'safety' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:500',
    ]);

    $overall = round((
        $request->teaching_quality +
        $request->facilities +
        $request->administration +
        $request->safety
    ) / 4, 1);

    Rating::create([
        'user_id' => auth()->id(),
        'school_id' => $school->id,
        'teaching_quality' => $request->teaching_quality,
        'facilities' => $request->facilities,
        'administration' => $request->administration,
        'safety' => $request->safety,
        'overall_rating' => $overall,
        'comment' => $request->comment,
    ]);

    // تحديث التقييم العام للمدرسة
    $this->updateSchoolOverallRating($school);

    return response()->json(['message' => 'Rating submitted successfully']);
}

protected function updateSchoolOverallRating(School $school)
{
    $average = Rating::where('school_id', $school->id)->avg('overall_rating');
    $school->update(['overall_rating' => round($average, 1)]);
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