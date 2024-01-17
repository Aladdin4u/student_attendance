<?php

namespace App\DataTables;

use App\Models\Attendance;
use App\Models\Lecturer_courses;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class AttendancesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Status', function (Attendance $attendance) {
                if ($attendance->is_present === 'present') {
                    return '<div>
                <span class="py-1 px-2 rounded-sm text-white capitalize bg-green-600">
                  ' . $attendance->is_present . '
                </span></div>';
                } else {
                    return '<div>
                <span class="py-1 px-2.5 rounded-sm text-white capitalize bg-red-600">
                  ' . $attendance->is_present . '
                </span></div>';
                }
            })
            ->rawColumns(['Status'])
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Attendance $model): QueryBuilder
    {
        if($this->course_id) {
            $lc = Lecturer_courses::where("user_id", auth()->user()->id)
            ->where("course_id", $this->course_id)
            ->get(["course_id"])->first();
        } else {
            $lc = Lecturer_courses::where("user_id", auth()->user()->id)
            ->get(["course_id"])->first();
        }
        if ($this->from && $this->to) {
            return $model->where('attendances.course_id', $lc->course_id ?? 0)
                ->whereBetween('attendances.date', [$this->from, $this->to])
                ->join("students", "attendances.user_id", "=", "students.user_id")
                ->join("courses", "attendances.course_id", "=", "courses.id")
                ->select('attendances.*', 'students.firstName', 'students.lastName', 'students.otherName', 'students.regNumber', 'students.department', 'courses.code', 'courses.title')->newQuery();
        }
        return $model->where('attendances.course_id', $lc->course_id ?? 0)
            ->join("students", "attendances.user_id", "=", "students.user_id")
            ->join("courses", "attendances.course_id", "=", "courses.id")
            ->select('attendances.*', 'students.firstName', 'students.lastName', 'students.otherName', 'students.regNumber', 'students.department', 'courses.code', 'courses.title')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('attendances-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom( 'Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->searchable(false)->orderable(false),
            Column::make('firstName')->name('students.firstName'),
            Column::make('lastName')->name('students.lastName'),
            Column::make('otherName')->name('students.otherName'),
            Column::make('regNumber')->name('students.regNumber'),
            Column::make('code')->name('courses.code'),
            Column::make('department')->name('students.department'),
            Column::computed('Status'),
            Column::make('date'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Attendance_' . date('YmdHis');
    }
}
