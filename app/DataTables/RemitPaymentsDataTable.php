<?php

namespace App\DataTables;

use App\Models\Agent;
use App\Models\Collector;
use App\Models\RemitPayments;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RemitPaymentsDataTable extends DataTable
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
            ->editColumn('agent_id', function ($item) {
                if (empty($item->agents)) {
                    $agent_id = $item->agent_id;
                    $res = Agent::whereHas('biodata', function ($q) use ($agent_id) {
                        $q->where('unique_code', $agent_id);
                    })->first();
                    return @$res->full_name;
                }
                return @$item->agents->full_name;
            })
            ->editColumn('collector_id', function ($item) {
                if (empty($item->agents)) {
                    $agent_id = $item->collector_id;
                    $res = Collector::whereHas('biodata', function ($q) use ($agent_id) {
                        $q->where('unique_code', $agent_id);
                    })->first();
                    return @$res->full_name;
                }
                return @$item->collectors->full_name;
            });
        $dataTable->editColumn('partial_amount', function ($item) {
            $payment = RemitPayments::where('collector_id', $item->collector_id)->get()->sum('partial_amount');
            return number_format(@$payment, 2);
        });
        $dataTable->addColumn('action', function ($item) {
            return view('remit_payments.datatables_actions', compact('item'))->render();
        });
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\RemitPayments $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(RemitPayments $model)
    {
        $yest = Carbon::yesterday();
        $today = Carbon::today();
        $q = $model
            //->whereDate('created_at', $today)
            ->newQuery();
        $lga_id = session('lga_id');
        if (!empty($lga_id) && $lga_id != "0") {
            $q->where('lga', $lga_id);
        }
        return $q->groupBy('collector_id');
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
        if (auth()->user()->hasAnyRole(['govt'])) {
            return [
                'date',
                ['title' => 'Amount', 'data' => 'partial_amount', 'footer' => 'partial_amount'],
                ['title' => 'Local Govt', 'data' => 'lga', 'footer' => 'lga'],
            ];
        }
        return [
            'agent_id',
            'collector_id',
            'date',
            ['title' => 'Amount', 'data' => 'partial_amount', 'footer' => 'partial_amount'],
            ['title' => 'Local Govt', 'data' => 'lga', 'footer' => 'lga'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'remit_paymentsdatatable_' . time();
    }
}
