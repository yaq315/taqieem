<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use App\Models\User;

class RatingsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('ratings')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $schools = School::all();
        $parents = User::where('role', 'parent')->get();

        if ($schools->isEmpty() || $parents->isEmpty()) {
            $this->command->info('No schools or parents found. Seeder aborted.');
            return;
        }

        $comments = [
            'Overall good experience',
            'My child is happy here',
            'The facilities could be better',
            'Great staff and administration',
            'Safe and nurturing environment',
            'Needs improvement in teaching quality',
            'I appreciate the efforts of the teachers',
            'School is well managed',
        ];

        foreach ($schools as $school) {
            foreach ($parents as $parent) {
                if (rand(0, 100) < 30) continue;

                $teaching = rand(3, 5);
                $facilities = rand(3, 5);
                $administration = rand(3, 5);
                $safety = rand(3, 5);
                $overall_rating = round(($teaching + $facilities + $administration + $safety) / 4, 1);

                DB::table('ratings')->insert([
                    'user_id' => $parent->id,
                    'school_id' => $school->id,
                    'teaching_quality' => $teaching,
                    'facilities' => $facilities,
                    'administration' => $administration,
                    'safety' => $safety,
                    'overall_rating' => $overall_rating, // تم تغيير هذا من 'rating' إلى 'overall_rating'
                    'comment' => $comments[array_rand($comments)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('Ratings seeded successfully!');
    }
}