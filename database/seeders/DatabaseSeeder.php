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
            [
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
            ],
            [
                'student_no' => 'ElectionChair',
                'firstname' => 'Christian',
                'middlename' => 'C',
                'lastname' => 'Bernarte',
                'course' => 'BS Computer Science',
                'year' => '4th Year',
                'block' => 'A',
                'mobile_no' => '09213108252',
                'is_approved' => true,
                'role' => 1,
                'email' => 'electionchair@gmail.com',
                'password' => Hash::make('election2025'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Generate 100 students with incrementing details
        $student_data = [];
        $password = Hash::make('ccdi2025^');
        $courses = [
            'BS Computer Science',
            'BS Information Technology',
            'BS Office Administration',
            'ACT Programming',
            'ACT Networking',
            'ACT Multimedia',
        ];
        $years = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
        $blocks = ['A', 'B', 'C'];
        for ($i = 1; $i <= 100; $i++) {
            $student_data[] = [
                'student_no' => '2022-1' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'firstname' => 'Student ' . $i,
                'middlename' => 'Ccdi',
                'lastname' => 'Ccdi',
                'course' => $courses[($i - 1) % count($courses)],
                'year' => $years[($i - 1) % count($years)],
                'block' => $blocks[($i - 1) % count($blocks)],
                'mobile_no' => '0917' . str_pad($i, 7, '0', STR_PAD_LEFT),
                'is_approved' => true,
                'role' => 3,
                'email' => 'student' . $i . '@gmail.com',
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Course::insert($course_data);
        User::insert($student_data);
        User::insert($admin_data);
    }
}
