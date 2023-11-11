<?php

namespace App\DataTables;

use App\Models\Lecturer_courses;
use App\Models\Student_courses;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LecturerStudentsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Attendance', function (Student_courses $student) {
                return '<a href="/students/' . $student->student_id . '" class="text-sky-400 hover:text-sky-500 underline">view attendance</a>';
            })
            ->rawColumns(['Attendance'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Student_courses $model): QueryBuilder
    {
        $lc = Lecturer_courses::where("user_id", auth()->user()->id)
            ->get(["course_id"])->first();
        return $model->where("course_id", $lc->course_id)
            ->join("students", "student_courses.student_id", "=", "students.id")
            ->join("courses", "Student_courses.course_id", "=", "courses.id")->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('lecturer-students-table')
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
            Column::make('id'),
            Column::make('firstName'),
            Column::make('lastName'),
            Column::make('otherName'),
            Column::make('regNumber'),
            Column::make('code'),
            Column::make('level'),
            Column::computed('Attendance'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'LecturerStudents_' . date('YmdHis');
    }
}
