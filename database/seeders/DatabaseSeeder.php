<?php

namespace Database\Seeders;

use App\Models\{User, Course};
// use Illuminate\Datab[hase\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'course' => 'ACT Programming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'ACT Networking',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course' => 'ACT Multimedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $admin_data = [
            'student_no' => 'Admin02',
            'firstname' => 'Dominic',
            'middlename' => 'Anonymous',
            'lastname' => 'Azupardo',
            'course' => 'BS Computer Science',
            'year' => '4th Year',
            'block' => 'A',
            'mobile_no' => '09213108252',
            'is_approved' => true,
            'role' => 1,
            'email' => 'dominicazupardo@gmail.com',
            'password' => Hash::make('Itisfinished2025^'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Course::insert($course_data);
        User::insert($admin_data);
    }
}
