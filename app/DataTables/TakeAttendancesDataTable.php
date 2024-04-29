<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\Course;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TakeAttendancesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(BelongsToMany $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Check', function (User $user) {
                return '<div id="form"><input type="checkbox"   class="checked:accent-sky-500 accent-sky-400" onclick="handleAttendance(this.value)"  value="' . $user->id . '" />
                <input type="text" id="course_id" name="course_id" class="sr-only" value="' . $user->course_id . '"  /><div>';
            })
            ->rawColumns(['Check'])
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Course $model): BelongsToMany
    {
        if ($this->course_id) {
            $course_id = User::find(auth()->user()->id)
                ->courses()
                ->where("courses.id", $this->course_id)
                ->get(["courses.id"])->first();
        } else {
            $course_id = User::find(auth()->user()->id)
                ->courses()
                ->get(["courses.id"])->first();
        }

        return $model->find($course_id->id)->lectures()->whereNot("users.role", "lecturer")->join('students', 'users.id', '=', 'students.user_id')->join('courses', 'courses_offers.course_id', '=', 'courses.id')
            ->select('users.id as id', 'users.firstName', 'users.lastName', 'students.otherName', 'students.regNumber', 'students.department', 'courses.id as course_id', 'courses.code', 'courses.title')->newQuery();
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
            Column::make('firstName')->name('users.firstName'),
            Column::make('lastName')->name('users.lastName'),
            Column::make('otherName')->name('students.otherName'),
            Column::make('regNumber')->name('students.regNumber'),
            Column::make('code')->name('courses.code'),
            Column::make('department')->name('students.department'),
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
