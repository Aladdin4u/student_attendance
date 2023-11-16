<?php

namespace App\DataTables;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SingleStudentsDataTable extends DataTable
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
        return $model->where('attendances.student_id', $this->id)
            ->join("students", "attendances.student_id", "=", "students.id")
            ->join("courses", "attendances.course_id", "=", "courses.id")
            ->select('attendances.*', 'students.firstName', 'students.lastName', 'students.otherName', 'students.regNumber', 'students.level', 'courses.code', 'courses.title')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('single-students-table')
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
            Column::make('code')->name('courses.code'),
            Column::make('title')->name('courses.title'),
            Column::make('date'),
            Column::computed('Status'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SingleStudents_' . date('YmdHis');
    }
}
