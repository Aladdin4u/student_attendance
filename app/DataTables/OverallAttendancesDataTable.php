<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\Course;
use App\Models\Attendance;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OverallAttendancesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(BelongsToMany $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Status', function (User $user) {
                $att = Attendance::where("user_id", $user->id)->where("course_id", $user->course_id)->where("status", "present")->count();
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
            ->addColumn('Total %', function (User $user) {
                $att = Attendance::where("user_id", $user->id)->where("course_id", $user->course_id)->where("status", "present")->count();
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
    public function query(Course $model): BelongsToMany
    {
        return $model->find($this->course_id)
            ->lectures()->whereNot("users.id", auth()->user()->id)
            ->join('personal_details', 'users.id', '=', 'personal_details.user_id')
            ->join('courses', 'courses_offers.course_id', '=', 'courses.id')
            ->select('users.id as id', 'personal_details.firstName', 'personal_details.lastName', 'courses.id as course_id', 'courses.code', 'courses.title')
            ->newQuery();
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
            Column::make('firstName')->name('personal_details.firstName'),
            Column::make('lastName')->name('personal_details.lastName'),
            Column::make('title')->name('courses.title')->title('Course Title'),
            Column::make('code')->name('courses.code'),
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
