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
    $user = auth()->user();

    if ($user->role !== 'parent') {
        return redirect()->back()->with('error', 'Only parents are allowed to submit ratings.');
    }

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

    $existingRating = Rating::where('school_id', $school->id)
                            ->where('user_id', $user->id)
                            ->first();

    if ($existingRating) {
        $existingRating->update([
            'overall_rating' => $overallRating,
            'teaching_quality' => $request->teaching_quality,
            'facilities' => $request->facilities,
            'administration' => $request->administration,
            'safety' => $request->safety,
            'comment' => $request->comment,
        ]);
    } else {
        $school->ratings()->create([
            'user_id' => $user->id,
            'overall_rating' => $overallRating,
            'teaching_quality' => $request->teaching_quality,
            'facilities' => $request->facilities,
            'administration' => $request->administration,
            'safety' => $request->safety,
            'comment' => $request->comment,
        ]);
    }

    // ✅ تحديث متوسط تقييم المدرسة
   $average = Rating::where('school_id', $school->id)->avg('overall_rating');

// إعادة تحميل الكائن من قاعدة البيانات لضمان التحديث السليم
$school = School::find($school->id);
$school->overall_rating = round($average, 1);
$school->save();


    return redirect()->back()->with('success', 'Your rating has been submitted/updated successfully!');
}



}