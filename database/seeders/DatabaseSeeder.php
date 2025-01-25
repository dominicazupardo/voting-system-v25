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
                'course' => 'BS Computer Science 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Computer Science 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Computer Science 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Computer Science 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Informatin Technology 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Informatin Technology 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Informatin Technology 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Informatin Technology 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Office Administration 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Office Administration 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Office Administration 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'BS Office Administration 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'ACT Programmig 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'ACT Programmig 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'ACT Networking 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'ACT Networking 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Course::insert($course_data);
    }
}
