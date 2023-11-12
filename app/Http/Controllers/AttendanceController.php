<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lession;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Student_courses;
use App\Models\Lecturer_courses;
use App\DataTables\TakeAttendancesDataTable;

class AttendanceController extends Controller
{
    // show all students
    public function index()
    {
        $attendances = Attendance::join("students", "attendances.student_id", "=", "students.id", "left")
            ->join("courses", "attendances.course_id", "=", "courses.id", "left")->filter(request(["date"]))->get();
        // dd($request, $attendances);
        return view("attendances.index", [
            "attendances" => $attendances,
            // "database" => datatables(Student::all())->toJson()
        ]);
    }
    // show attendance
    public function show(Attendance $attendance)
    {

        return view("attendances.show", [
            "attendance" => $attendance
        ]);
    }

    // show create form
    public function create(TakeAttendancesDataTable $dataTable)
    {
        return $dataTable->render("attendances.create");
    }

    // store form data
    public function store(Request $request)
    {
        $records = $request->formData;
        $formFields = [];
        foreach ($records as $record) {
            $formFields[] = $record;
        }

        Attendance::insert($formFields);

        return redirect("/attendances")->with("message", "Attendance created successfully!");
    }

    // destroy attendance data 
    public function destroy(Attendance $attendance)
    {
        if (auth()->user()->role != "admin") {
            abort(403, "Unauthorized Action");
        }

        $attendance->delete();

        return redirect("/attendances")->with("message", "Attendance Deleted Successfully!");
    }

    public function manage(Attendance $attendance)
    {

        return view("attendances.manage", [
            "attendances" => $attendance::latest()->filter(request(["search"]))->paginate(6)
        ]);
    }
}
