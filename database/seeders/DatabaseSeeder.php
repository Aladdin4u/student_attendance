<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Attendance;
use App\Models\User;
use App\Models\Level;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Department;
use App\Models\Programmee;
use App\Models\CoursesOffer;
use App\Models\PersonalDetail;
use Illuminate\Database\Seeder;
use App\Models\StudentAdmission;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faculties = ['arts', 'classics', 'commerce', 'economics', 'education', 'engineering', 'graduate studies', 'health', 'humanities', 'information technology', 'law', 'management studies', 'music', 'sciences', 'philosophy', 'political science'];

        $reg = ['2024/000001', '2024/000002', '2024/000003', '2024/000004', '2024/000005', '2024/000006', '2024/000007', '2024/000008', '2024/000009', '2024/000010', '2024/000011', '2024/000012', '2024/000013', '2024/000014', '2024/000015', '2024/000016', '2024/000017', '2024/000018', '2024/000019', '2024/000020'];

        $codes = ["CSC 101", "CSC 102", "GNS 101", "PHY 101", "PHY 103", "PHY 107"];

        $titles = ["Introduction to Computer Science", "Introduction to Computer Studies", "USE of ENGLISH l", "General Physics I (Mechanics)", "General Physics III", "Experimental Physics"];

        $units = [3, 3, 2, 2, 2, 2];
        $userId = [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 20];

        User::factory()
            ->count(2)
            ->state(new Sequence(
                ['role' => 'admin', 'email' => 'admin@example.com'],
                ['role' => 'lecturer', 'email' => 'lecturer@example.com'],
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

        Level::factory()->count(4)->create();

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

        Section::factory()->create();

        Programmee::factory()
            ->count(18)
            ->sequence(fn (Sequence $sequence) => [
                'user_id' => $sequence->index + 3,
            ])
            ->create();

        CoursesOffer::factory()
        ->count(19)
        ->sequence(fn (Sequence $sequence) => [
            'user_id' => $sequence->index + 2,
        ])
        ->create();

        Attendance::factory()
        ->count(18)
        ->sequence(fn (Sequence $sequence) => [
            'user_id' => $sequence->index + 3,
        ])
        ->create();
    }
}
