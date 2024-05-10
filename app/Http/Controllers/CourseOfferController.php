<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CoursesOffer;
use App\DataTables\LecturesDataTable;
use App\DataTables\LecturerStudentsDataTable;
use App\Models\Course;
use App\Models\Department;
use App\Models\Programmee;
use App\Models\StudentAdmission;

class CourseOfferController extends Controller
{
    // lecturer lecture
    public function index(LecturesDataTable $dataTable)
    {
        return $dataTable->render('lecturers.index');
    }

    // show lecturer lecture
    public function show($lecture, LecturerStudentsDataTable $dataTable)
    {
        return $dataTable->with('course_id', $lecture)->render('lecturers.show');
    }

    // show create course offerser
    public function create($user)
    {
        $coursesoffer = CoursesOffer::where('user_id', $user)->get();
        if(!$coursesoffer->isEmpty()) {
            return back()->with("message", "Course registration is completed");
        }
        $dept = StudentAdmission::where('user_id', $user)->get('department_id');
        $level = Programmee::where('user_id', $user)
            ->join('sections', 'programmees.section_id', '=', 'sections.id')
            ->where('sections.is_active', 1)->get('level_id');
        if (!$dept->isEmpty() && !$level->isEmpty()) {

            $courses = Course::where('department_id', $dept[0]->department_id)
                ->where('level_id', $level[0]->level_id)
                ->get();
        }
        // dd($dept, $level, $courses);
        return view('courseoffers.create', [
            'courses' => $courses,
            'user' => $user
        ]);
    }

    // store form data
    public function store(Request $request)
    {
        $records = $request->formData;

        foreach ($records as $record) {
            $formFields[] = $record;
        }

        CoursesOffer::insert($formFields);
    }

    // destroy student_courses data 
    public function destroy(CoursesOffer $courses_offer)
    {
        $courses_offer->delete();

        return back()->with("message", "Course Deleted Successfully!");
    }
}
