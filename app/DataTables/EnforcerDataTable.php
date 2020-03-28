<?php

namespace App\DataTables;

use App\Models\Enforcer;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class EnforcerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        $dataTable ->addColumn('lga_id', function ($item) {
                return @$item->local_govt->name;
            });
        return $dataTable->addColumn('action', 'enforcers.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Enforcer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Enforcer $model)
    {
        return $model->newQuery()->with(['state', 'local_govt']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'first_name',
            'last_name',
            'phone',
            ['title' => 'Enforcers ID', 'data' => 'unique_id'],
            ['title' => 'Local Govt', 'data' => 'lga_id'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'enforcersdatatable_' . time();
    }
}
