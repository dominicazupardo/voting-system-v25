<?php

namespace Database\Seeders;

use App\Models\{User, Course};
// use Illuminate\Datab[hase\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $course_data = [
            [
                'course' => 'BS Computer Science',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Informatin Technology',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Office Administration',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'ACT Programmig 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'ACT Networking 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Course::insert($course_data);
    }
}
