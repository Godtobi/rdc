<?php

namespace App\DataTables;

use App\Models\Biodata;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BiodataDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'biodatas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Biodata $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Biodata $model)
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
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
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
            'data_id',
            'model',
            'unique_code',
            'tally_number',
            'email',
            'account_number',
            'medical_condition',
            'guarantor_name',
            'contact',
            'guarantor_address',
            'emergency_contact_name_1',
            'phone_no_1',
            'emergency_contact_name_2',
            'phone_no_2',
            'next_of_kin',
            'next_of_kin_address',
            'next_of_kin_phone',
            'pfa',
            'rsa_number',
            'job_title',
            'driver_lic_issuance_date',
            'driver_lic_expiry_date',
            'driver_lic_date',
            'dob',
            'sex',
            'bank',
            'spouse_name',
            'spouse_address',
            'spouse_phone',
            'employment_date',
            'lga_id',
            'bank_code',
            'bank_pfa_code',
            'driver_license_number',
            'pre_employment_test_result_date',
            'pre_employment_test_date',
            'salary'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'biodatasdatatable_' . time();
    }
}
