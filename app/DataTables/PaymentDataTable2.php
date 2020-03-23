<?php

namespace App\DataTables;

use App\Models\Payment;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PaymentDataTable2 extends DataTable
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
            ->editColumn('vehicle_type_id', function ($item) {
                if (empty($item->vehicle_type)) {
                    return @$item->vehicle_type_id;
                }
                return @$item->vehicle_type->name;
            })
            ->editColumn('partial_amount', function ($item) {
                return number_format(@$item->amount, 2);
            })
            ->editColumn('agent', function ($item) {
                return @$item->user->name;
            })
            ->filterColumn('agent', function ($query, $keyword) {
                $query->whereHas('user', function ($query) use ($keyword) {
                    $sql = "users.name  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                });
            })
            ->editColumn('time', function ($__res) {
                //return $__res->created_at->format('h:i a');
                return $__res->created_at->format('Y-m-d h:i a');
            });
        $dataTable->addColumn('action', function ($item) {
            return view('payments.datatables_actions', compact('item'))->render();
        });

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Payment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Payment $model)
    {
        $yest = Carbon::yesterday();
        $today = Carbon::today();
        return $model->whereDate('created_at', $yest)->newQuery();
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
            // ['title' => 'Driver Name', 'data' => 'driver_name', 'footer' => 'driver_name', 'orderable' => false],
            // ['title' => 'Local Govt', 'data' => 'local_govt', 'footer' => 'local_govt', 'orderable' => false],
            ['title' => 'Agent', 'data' => 'agent', 'footer' => 'agent', 'orderable' => false],
            ['title' => 'Vehicle Type', 'data' => 'vehicle_type_id', 'footer' => 'vehicle_type_id'],
            ['title' => 'Time', 'data' => 'time', 'footer' => 'time', 'searchable' => false],
            ['title' => 'Amount', 'data' => 'partial_amount', 'footer' => 'partial_amount'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'paymentsdatatable_' . time();
    }
}
