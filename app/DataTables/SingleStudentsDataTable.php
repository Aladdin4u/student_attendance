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
            ->addColumn('Edit', function (Attendance $ttendance) {
                return '<a href="/attendances/' . $ttendance->id . '/edit"><button>
    <svg class="flex-shrink-0 w-6 h-6 stroke-gray-500 transition duration-75 hover:stroke-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path d="M13.2601 3.6L5.0501 12.29C4.7401 12.62 4.4401 13.27 4.3801 13.72L4.0101 16.96C3.8801 18.13 4.7201 18.93 5.8801 18.73L9.1001 18.18C9.5501 18.1 10.1801 17.77 10.4901 17.43L18.7001 8.74C20.1201 7.24 20.7601 5.53 18.5501 3.44C16.3501 1.37 14.6801 2.1 13.2601 3.6Z M11.8899 5.05C12.3199 7.81 14.5599 9.92 17.3399 10.2 M3 22H21" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
    </svg></button></a>';
            })
            ->rawColumns(['Edit'])
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Attendance $model): QueryBuilder
    {
        return $model->where('course_id', $this->id)
            ->join('personal_details', 'attendances.user_id', '=', 'personal_details.id')
            ->join('courses', 'attendances.course_id', '=', 'courses.id')
            ->select('attendances.id as id', 'attendances.date', 'attendances.status', 'personal_details.firstName', 'personal_details.lastName', 'courses.code', 'courses.title')
            ->newQuery();
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
            Column::make('firstName')->name('personal_details.firstName'),
            Column::make('lastName')->name('personal_details.lastName'),
            Column::make('code')->name('courses.code'),
            Column::make('title')->name('courses.title'),
            Column::make('date')->name('attendances.date'),
            Column::make('status')->name('attendances.status'),
            Column::computed('Edit'),
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
