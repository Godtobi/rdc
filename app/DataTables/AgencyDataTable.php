<?php

namespace App\DataTables;

use App\Models\Agency;
use App\Models\Payment;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AgencyDataTable extends DataTable
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
            ->addColumn('payment', function ($item) {
                $payment = new Payment();
                $amount = $payment->IsAgencyDailyAmount($item->id);
                return @$amount;
            });

        return $dataTable->addColumn('action', 'agencies.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Agency $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Agency $model)
    {
        return $model->newQuery();
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
            ['title' => 'Name', 'data' => 'name', 'footer' => 'name'],
            ['title' => 'Address', 'data' => 'address', 'footer' => 'address'],
            ['title' => 'Contact Name', 'data' => 'contact_name', 'footer' => 'contact_name'],
            ['title' => 'Contact Phone', 'data' => 'contact_phone', 'footer' => 'contact_phone'],
            ['title' => 'Daily Payment', 'data' => 'payment', 'footer' => 'payment'],
        ];

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'agenciesdatatable_' . time();
    }
}
