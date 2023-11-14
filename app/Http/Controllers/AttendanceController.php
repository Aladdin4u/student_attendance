<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\AttendancesDataTable;
use App\DataTables\TakeAttendancesDataTable;
use App\DataTables\OverallAttendancesDataTable;

class AttendanceController extends Controller
{
    // show all students
    public function index(AttendancesDataTable $dataTable)
    {
        return $dataTable->render("attendances.index");
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

    public function manage(OverallAttendancesDataTable $dataTable)
    {

        $distinct = DB::table('attendances')->distinct()->get(['id','course_id', 'student_id']);
        $count = Attendance::where("student_id", 1)->where("is_present", "present")->count();
        $c = Attendance::where("student_id", 1)->where("is_present", "present")->get();
        $perct = ($count / 90) * 100;
        // dd($distinct, $perct, $c);
        return $dataTable->render("attendances.manage");
        // return view("attendances.manage", [
        //     "attendances" => $attendance::latest()->filter(request(["search"]))->paginate(6)
        // ]);
    }
}
