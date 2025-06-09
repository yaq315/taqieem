<?php
namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, School $school)
{
    $request->validate([
        'teaching_quality' => 'required|integer|between:1,5',
        'facilities' => 'required|integer|between:1,5',
        'administration' => 'required|integer|between:1,5',
        'safety' => 'required|integer|between:1,5',
        'comment' => 'nullable|string|max:500',
    ]);

    $overallRating = (
        $request->teaching_quality + 
        $request->facilities + 
        $request->administration + 
        $request->safety
    ) / 4;

    $rating = $school->ratings()->create([
        'user_id' => auth()->id(),
        'overall_rating' => $overallRating,
        'teaching_quality' => $request->teaching_quality,
        'facilities' => $request->facilities,
        'administration' => $request->administration,
        'safety' => $request->safety,
        'comment' => $request->comment,
    ]);

    return redirect()->back()->with('success', 'Rating submitted successfully!');
}
}