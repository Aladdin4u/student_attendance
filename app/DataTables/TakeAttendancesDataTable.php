<?php

namespace App\DataTables;

use App\Models\Student_courses;
use App\Models\Lecturer_courses;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class TakeAttendancesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Check', function (Student_courses $student) {
                return '<div id="form"><input type="checkbox" id="' . $student->id . '" name="is_present" value="' . $student->student_id . '" />
                <input type="text" id="course_id" name="course_id" value="' . $student->course_id . '" class="sr-only" />
                <input type="date" id="date" name="date" value="' . date('Y-m-d') . '" class="sr-only" /><div>';
            })
            ->rawColumns(['Check'])
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Student_courses $model): QueryBuilder
    {
        $lc = Lecturer_courses::where("user_id", auth()->user()->id)
            ->get(["course_id"])->first();
        if ($this->course_id) {
            $lc = Lecturer_courses::where("user_id", auth()->user()->id)
                ->where("course_id", $this->course_id)
                ->get(["course_id"])->first();
        }
        return $model->where('student_courses.course_id', $lc->course_id)->join('students', 'student_courses.student_id', '=', 'students.id')
            ->join('courses', 'student_courses.course_id', '=', 'courses.id')
            ->select('student_courses.*', 'students.firstName', 'students.lastName', 'students.otherName', 'students.regNumber', 'students.level', 'courses.code', 'courses.title')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('take-attendances-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
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
            Column::make('level')->name('students.level'),
            Column::computed('Check'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TakeAttendance_' . date('YmdHis');
    }
}
