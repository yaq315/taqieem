<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_id', 'school_id', 'teaching_quality', 
        'facilities', 'administration', 'safety', 'comment'
    ];

    protected $appends = ['overall_rating'];

    public function getOverallRatingAttribute()
    {
        return ($this->teaching_quality + $this->facilities + 
                $this->administration + $this->safety) / 4;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
