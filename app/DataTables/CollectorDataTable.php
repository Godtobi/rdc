<?php

namespace App\DataTables;

use App\Models\Collector;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CollectorDataTable extends DataTable
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
        $dataTable
            ->addColumn('email', function ($item) {
                return @$item->biodata->email;
            })
            ->addColumn('device_id', function ($item) {
                return @$item->user->device_id;
            })
            ->filterColumn('device_id', function ($query, $keyword) {
                $query->whereHas('user', function ($query) use ($keyword) {
                    $sql = "users.device_id  like ? ";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                });
            })
            ->addColumn('collector_id', function ($item) {
                return @$item->biodata->unique_code;
            });
        return $dataTable->addColumn('action', 'collectors.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Collector $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Collector $model)
    {
        return $model->newQuery()->with('biodata');
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
            'email',
            'collector_id',
            ['title' => 'Device ID', 'data' => 'device_id', 'footer' => 'device_id'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'collectorsdatatable_' . time();
    }
}
