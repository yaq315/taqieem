<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run()
{
    $schools = [
        [
            'name' => 'Queen Rania Academy',
            'location' => 'Amman',
            'description' => 'A leading school in modern education.',
            'image' => 'images/courses/course-1.jpg'
        ],
        [
            'name' => 'Modern Montessori School - MMS',
            'location' => 'Amman',
            'description' => 'Applies the Montessori educational approach.',
            'image' => 'images/courses/course-2.jpg'
        ],
        [
            'name' => 'Amman Academy',
            'location' => 'Amman',
            'description' => 'A private IB World School offering high-quality education.',
            'image' => 'images/courses/course-3.jpg'
        ],
        [
            'name' => 'International Community School - ICS',
            'location' => 'Amman',
            'description' => 'An international British school focused on academic excellence and personal growth.',
            'image' => 'images/courses/course-4.jpg'
        ],
        [
            'name' => 'Al Asriyya Schools',
            'location' => 'Amman',
            'description' => 'A private school providing bilingual education with a focus on innovation.',
            'image' => 'images/courses/course-5.jpg'
        ],
        [
            'name' => 'Cambridge High School',
            'location' => 'Amman',
            'description' => 'Offers British curriculum and fosters creativity and leadership.',
            'image' => 'images/courses/course-6.jpg'
        ],
        [
            'name' => 'The International Academy - Amman (IAA)',
            'location' => 'Amman',
            'description' => 'A world-class school offering IB and international programs in a modern environment.',
            'image' => 'images/courses/course-1.jpg'
        ],
        [
            'name' => 'American Community School',
            'location' => 'Amman',
            'description' => 'Provides American-based curriculum with a focus on holistic development.',
            'image' => 'images/courses/course-2.jpg'
        ],
          [
            'name' => 'Amman Baccalaureate School',
            'location' => 'Amman',
            'description' => 'Offers the IB program with a focus on academic excellence.',
            'image' => 'images/courses/course-3.jpg'
        ],
        [
            'name' => 'International Community School - ICS',
            'location' => 'Amman',
            'description' => 'A British international school promoting global citizenship.',
            'image' => 'images/courses/course-4.jpg'
        ],
        [
            'name' => 'The International Academy - Amman (IAA)',
            'location' => 'Amman',
            'description' => 'Combines local values with international standards.',
            'image' => 'images/courses/course-5.jpg'
        ],
        [
            'name' => 'Al Asriyya Schools',
            'location' => 'Amman',
            'description' => 'Focuses on innovation and holistic student development.',
            'image' => 'images/courses/course-6.jpg'
        ],
        [
            'name' => 'National Orthodox School',
            'location' => 'Amman',
            'description' => 'A private school known for strong academics and values.',
            'image' => 'images/courses/course-1.jpg'
        ],
        [
            'name' => 'American Community School - ACS',
            'location' => 'Amman',
            'description' => 'Offers an American curriculum in a multicultural environment.',
            'image' => 'images/courses/course-2.jpg'
        ]
    ];

    foreach ($schools as $school) {
        School::create($school);
    }
}

}
