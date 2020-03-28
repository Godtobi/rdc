<?php

namespace App\DataTables;

use App\Models\Agent;
use App\Models\Lga;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AgentDataTable extends DataTable
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
            ->addColumn('lg', function ($item) {
                $lga_id= @$item->biodata->lga_id;
                if (empty($lga_id)){
                    return "";
                }

                    return Lga::find($lga_id)->name;

            })

            ->filterColumn('device_id', function ($query, $keyword) {
                $query->whereHas('user', function ($query) use ($keyword) {
                    $sql = "users.device_id  like ? ";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                });
            })
            ->addColumn('agent_id', function ($item) {
                return @$item->biodata->unique_code;
            });
        return $dataTable->addColumn('action', 'agents.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Agent $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Agent $model)
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
            ['title' => 'Agent ID', 'data' => 'agent_id', 'footer' => 'agent_id'],
            ['title' => 'First Name', 'data' => 'first_name', 'footer' => 'first_name'],
            ['title' => 'Last Name', 'data' => 'last_name', 'footer' => 'last_name'],
            ['title' => 'Phone', 'data' => 'phone', 'footer' => 'phone'],
            ['title' => 'LGA', 'data' => 'lg', 'footer' => 'LGA'],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'agentsdatatable_' . time();
    }
}
