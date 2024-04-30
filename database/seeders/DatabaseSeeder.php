<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Level;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\PersonalDetail;
use App\Models\StudentAdmission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faculties = ['arts', 'classics', 'commerce', 'economics', 'education', 'engineering', 'graduate studies', 'health', 'humanities', 'information technology', 'law', 'management studies', 'music', 'sciences', 'philosophy', 'political science'];

        $reg = ['REG/CSC/2024/001', 'REG/CSC/2024/002', 'REG/CSC/2024/003', 'REG/CSC/2024/004', 'REG/CSC/2024/005', 'REG/CSC/2024/006', 'REG/CSC/2024/007', 'REG/CSC/2024/008', 'REG/CSC/2024/009', 'REG/CSC/2024/010', 'REG/CSC/2024/011', 'REG/CSC/2024/012', 'REG/CSC/2024/013', 'REG/CSC/2024/014', 'REG/CSC/2024/015', 'REG/CSC/2024/016', 'REG/CSC/2024/017', 'REG/CSC/2024/018', 'REG/CSC/2024/019', 'REG/CSC/2024/020'];

        $codes = ["CSC 101", "CSC 102", "GNS 101", "PHY 101", "PHY 103", "PHY 107"];

        $titles = ["Introduction to Computer Science", "Introduction to Computer Studies", "USE of ENGLISH l", "General Physics I (Mechanics)", "General Physics III", "Experimental Physics"];

        $units = [3, 3, 3, 2, 2, 2];
        $userId = [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 20];
        // \App\Models\User::factory(5)->create();
        // \App\Models\Course::factory(5)->create();
        // \App\Models\Student::factory(5)->create();
        // \App\Models\Lecturer::factory(10)->create();


        User::factory()
            ->count(2)
            ->state(new Sequence(
                ['role' => 'admin', 'email' => 'admin@example.com'],
                ['role' => 'lecturer'],
            ))->create();

        User::factory()
            ->count(20)
            ->state(new Sequence(
                ['role' => 'student'],
            ))->create();

        PersonalDetail::factory()
            ->count(22)
            ->sequence(fn (Sequence $sequence) => ['user_id' => $sequence->index + 1])
            ->create();

        Level::factory()
            ->count(2)
            ->state(new Sequence(
                ['name' => '100', 'semester' => 'first', 'is_active' => true],
                ['name' => '100', 'semester' => 'second'],
            ))->create();

        Faculty::factory()
            ->count(16)
            ->sequence(fn (Sequence $sequence) => ['name' => $faculties[$sequence->index]])
            ->create();

        Department::factory()->create();

        Course::factory()
            ->count(6)
            ->sequence(fn (Sequence $sequence) => [
                'code' => $codes[$sequence->index], 'title' => $titles[$sequence->index],
                'unit' => $units[$sequence->index]
            ])
            ->create();

        StudentAdmission::factory()
            ->count(17)
            ->sequence(fn (Sequence $sequence) => [
                'regNumber' => $reg[$sequence->index],
                'user_id' => $userId[$sequence->index],
            ])
            ->create();
        // \App\Models\Course::factory(50)->create();
    }
}
