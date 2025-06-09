<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'location', 'description', 'image'];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function updateAverageRating()
    {
        $this->average_rating = $this->ratings()->avg('overall_rating');
        $this->save();
    }
}