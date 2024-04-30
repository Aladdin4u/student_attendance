<?php

namespace App\DataTables;

use App\Models\Level;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LevelDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('Edit', function (Level $level) {
                return '<a href="/levels/' . $level->id . '/edit"><button>
                <svg class="flex-shrink-0 w-6 h-6 stroke-gray-500 transition duration-75 hover:stroke-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.2601 3.6L5.0501 12.29C4.7401 12.62 4.4401 13.27 4.3801 13.72L4.0101 16.96C3.8801 18.13 4.7201 18.93 5.8801 18.73L9.1001 18.18C9.5501 18.1 10.1801 17.77 10.4901 17.43L18.7001 8.74C20.1201 7.24 20.7601 5.53 18.5501 3.44C16.3501 1.37 14.6801 2.1 13.2601 3.6Z M11.8899 5.05C12.3199 7.81 14.5599 9.92 17.3399 10.2 M3 22H21" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg></button></a>';
            })
            ->addColumn('Delete', function (Level $level) {
                return '<form method="POST" action="/levels/' . $level->id . '">
                ' . csrf_field() . '
                ' . method_field("DELETE") . '
                <button>
                  <svg class="flex-shrink-0 w-6 h-6 stroke-red-500 transition duration-75 hover:stroke-red-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998 M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97 M18.8499 9.14001L18.1999 19.21C18.0899 20.78 17.9999 22 15.2099 22H8.7899C5.9999 22 5.9099 20.78 5.7999 19.21L5.1499 9.14001 M10.3301 16.5H13.6601 M9.5 12.5H14.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
    
                </button>
              </form>';
            })
            ->rawColumns(['Edit', 'Delete'])
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Level $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('levels-table')
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
            Column::make('name'),
            Column::make('semester'),
            Column::make('start_date'),
            Column::make('end_date'),
            Column::make('is_active'),
            Column::computed('Edit'),
            Column::computed('Delete'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'levels_' . date('YmdHis');
    }
}
