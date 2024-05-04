<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\DataTables\AttendancesDataTable;
use App\DataTables\TakeAttendancesDataTable;
use App\DataTables\OverallAttendancesDataTable;
use App\DataTables\SingleStudentsDataTable;

class AttendanceController extends Controller
{
    // show all students
    public function index(AttendancesDataTable $dataTable, Request $request)
    {
        if ($request->filled('from_date') && $request->filled('to_date')) {
            return $dataTable->with(['from' => $request->from_date, 'to' => $request->to_date])->render("attendances.index");
        }
        if ($request->filled('course_id')) {
            // dd($request->course_id);
            return $dataTable->with('course_id', $request->course_id)->render("attendances.index");
        }
        return $dataTable->render("attendances.index");
    }
    // show attendance
    public function show(Attendance $attendance, SingleStudentsDataTable $dataTable)
    {

        return $dataTable->with('id', $attendance->id)->render("attendances.show");
    }

    // show create form
    public function create(TakeAttendancesDataTable $dataTable, Request $request)
    {
        if ($request->filled('course_id')) {
            // dd($request->course_id);
            return $dataTable->with('course_id', $request->course_id)->render("attendances.create");
        }
        return $dataTable->render("attendances.create");
    }

    // store form data
    public function store(Request $request)
    {
        $records = $request->formData;
        $date = $records[0]['date'];
        $course_id = $records[0]['course_id'];
        $ifAttendanceExist = Attendance::where('date', $date)->where('course_id', $course_id)->firstorFail();
        if ($ifAttendanceExist) {
            // dd($ifAttendanceExist);
            $data = ['message' => 'multiple entry is now allowed'];
            return response()->json($data, 422);
        }
        foreach ($records as $record) {
            $formFields[] = $record;
        }

        Attendance::insert($formFields);
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
        return $dataTable->render("attendances.manage");
    }
}
