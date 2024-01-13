<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();
        // \App\Models\Course::factory(5)->create();
        // \App\Models\Student::factory(5)->create();
        // \App\Models\Lecturer::factory(10)->create();


        \App\Models\User::factory()->create([
            'firstName' => 'admin',
            'lastName' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'phoneNumber' => '090000000',
            'password' => '123456789',
        ]);

        $lecturer = \App\Models\User::factory()->create([
            'firstName' => 'lecturer',
            'lastName' => 'lecturer',
            'email' => 'lecturer@example.com',
            'role' => 'lecturer',
            'phoneNumber' => '090000000',
            'password' => '123456789',
        ]);

        $eze = \App\Models\User::factory()->create([
            'firstName' => 'Chizoma',
            'lastName' => 'Eze',
            'role' => 'student',
            'email' => 'eze@example.com',
            'phoneNumber' => '090000000',
            'password' => '123456789'
        ]);
        $ibeh = \App\Models\User::factory()->create([
            'firstName' => 'Uchechukwu',
            'lastName' => 'Ibeh',
            'role' => 'student',
            'email' => 'ibeh@example.com',
            'password' => '123456789'
        ]);

        \App\Models\Course::factory(50)->create();
    }
}
