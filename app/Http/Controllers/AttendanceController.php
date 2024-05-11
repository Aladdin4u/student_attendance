<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\DataTables\AttendancesDataTable;
use App\DataTables\TakeAttendancesDataTable;
use App\DataTables\OverallAttendancesDataTable;
use App\DataTables\SingleStudentsDataTable;
use App\Models\Course;
use App\Models\PersonalDetail;

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
    public function show($attendance, SingleStudentsDataTable $dataTable)
    {
        return $dataTable->with('id', $attendance)->render("attendances.show");
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
        $ifAttendanceExist = Attendance::where('date', $date)->where('course_id', $course_id)->get();
        if (!$ifAttendanceExist->isEmpty()) {
            $data = ['message' => 'Multiple entry for a day is not allowed'];
            return response()->json($data, 422);
        }
        foreach ($records as $record) {
            Attendance::create($record);
        }
    }

    // show attendance edit form
    public function edit(Attendance $attendance)
    {
        $user = PersonalDetail::where('user_id', $attendance->user_id)->get(['firstName', 'lastName']);
        $course = Course::where('id', $attendance->course_id)->get(['id','code', 'title']);

        // dd($user, $course, $attendance);
        return view("Attendances.edit", [
            "attendance" => $attendance,
            "user" => $user,
            "course" => $course,
        ]);
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

    // update department form
    public function update(Request $request, Attendance $attendance)
    {
        $formFields = $request->validate([
            "date" => "required",
            "status" => "required",
        ]);

        $attendance->update($formFields);

        return redirect("/attendances/course/".$request->course)->with("message", "Attendance updated successfully!");
    }

    public function manage($lecture, OverallAttendancesDataTable $dataTable)
    {
        return $dataTable->with('course_id', $lecture)->render("attendances.manage");
    }
}
