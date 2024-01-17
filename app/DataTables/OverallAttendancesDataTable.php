<?php

namespace App\DataTables;

use App\Models\Attendance;
use App\Models\Lecturer_courses;
use App\Models\Student_courses;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class OverallAttendancesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Status', function (Student_courses $student) {
                $att = Attendance::where("user_id", $student->user_id)->where("is_present", "present")->count();
                $total = ($att / 24) * 100;
                if ($total >= 50) {
                    return '<div>
                    <span class="py-1 px-2 rounded-sm text-white capitalize bg-green-600">
                      qualified
                    </span></div>';
                } else {
                    return '<div>
                    <span class="py-1 px-2 rounded-sm text-white capitalize bg-green-600">
                      unqualified
                    </span></div>';
                }
            })
            ->addColumn('Total %', function (Student_courses $student) {
                $att = Attendance::where("user_id", $student->user_id)->where("is_present", "present")->count();
                $total = ($att / 24) * 100;
                return '<div>' . round($total, 2) . '%</div>';
            })
            ->rawColumns(['Status', 'Total %'])
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Student_courses $model): QueryBuilder
    {
        $lc = Lecturer_courses::where("user_id", auth()->user()->id)->get(["course_id"])->first();
        $data = $model->where('student_courses.course_id', $lc->course_id ?? 0)
            ->join("students", "student_courses.user_id", "=", "students.user_id")
            ->join("courses", "student_courses.course_id", "=", "courses.id")
            ->select('student_courses.*', 'students.firstName', 'students.lastName', 'students.otherName', 'students.regNumber', 'students.department', 'courses.code', 'courses.title')->newQuery();

        return $data;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('overall-attendances-table')
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
            Column::computed('Total %'),
            Column::computed('Status'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'OverallAttendance_' . date('YmdHis');
    }
}
