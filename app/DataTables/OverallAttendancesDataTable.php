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
            ->addColumn('Total %', function (Attendance $attendance) {
                return '<div>80%</div>';
            })
            ->rawColumns(['Status', 'Total %'])
            ->addIndexColumn()
            ->setRowId('id')
            ->filter(function (QueryBuilder $query) {
                if (request()->has('students.firstName')) {
                    $query->where('students.firstName', 'like', "%" . request('students.firstName') . "%");
                }

                if (request()->has('lastName')) {
                    $query->where('lastName', 'like', "%" . request('lastName') . "%");
                }
            }, true);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Attendance $model): QueryBuilder
    {
        $lc = Lecturer_courses::where("user_id", auth()->user()->id)
            ->get(["course_id"])->first();
        $data = $model->where('attendances.course_id', $lc->course_id)->join("students", "attendances.student_id", "=", "students.id")
            ->join("courses", "attendances.course_id", "=", "courses.id")
            ->select('attendances.*', 'students.firstName', 'students.lastName', 'students.otherName', 'students.regNumber', 'students.level', 'courses.code', 'courses.title')->newQuery();

        return $data;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ovrall-attendances-table')
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
            Column::make('firstName'),
            Column::make('lastName'),
            Column::make('otherName'),
            Column::make('regNumber'),
            Column::make('code'),
            Column::make('level'),
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
