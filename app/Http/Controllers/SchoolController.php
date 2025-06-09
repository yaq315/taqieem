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
}