<?php

namespace App\DataTables;

use App\Models\Agent;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AgencyAgentDataTable extends DataTable
{

    private $agency;

    /**
     * @return mixed
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * @param mixed $agency
     */
    public function setAgency($agency): void
    {
        $this->agency = $agency;
    }

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
        $agency = $this->getAgency();
        return $model->newQuery()->with('biodata')->where('agency_id', $agency->id);
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
            ['title' => 'Email', 'data' => 'email', 'footer' => 'email'],
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
        return 'agentsdatatable_' . time();
    }
}
