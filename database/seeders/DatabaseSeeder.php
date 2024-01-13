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

        $eze = \App\Models\Student::factory()->create([
            'firstName' => 'Chizoma',
            'lastName' => 'Eze',
            'otherName' => 'Francis',
            'email' => 'eze@example.com',
            'regNumber' => '2019/0000',
            'level' => '400',
            'password' => '123456789'
        ]);
        $ibeh = \App\Models\Student::factory()->create([
            'firstName' => 'Uchechukwu',
            'lastName' => 'Ibeh',
            'otherName' => 'john',
            'email' => 'ibeh@example.com',
            'regNumber' => '2019/0001',
            'level' => '400',
            'password' => '123456789'
        ]);

        \App\Models\Course::factory(50)->create();
    }
}
