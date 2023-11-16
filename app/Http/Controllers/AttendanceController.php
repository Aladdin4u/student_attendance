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
            dd($request->from_date, $request->to_date);
            // $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
        }
        return $dataTable->render("attendances.index");
    }
    // show attendance
    public function show(Attendance $attendance, SingleStudentsDataTable $dataTable)
    {

        return $dataTable->with('id', $attendance->id)->render("attendances.show");
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
        return $dataTable->render("attendances.manage");
    }
}
