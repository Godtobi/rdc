<?php

namespace App\DataTables;

use App\Models\Agent;
use App\Models\Biodata;
use App\Models\Lga;
use App\Models\Payment;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PaymentDataTable extends DataTable
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
//            ->filterColumn('vehicle_type_id', function ($query, $keyword) {
//                $query->whereHas('vehicle_type', function ($query) use ($keyword) {
//                    $sql = "vehicle_type.name  like ?";
//                    $query->whereRaw($sql, ["%{$keyword}%"]);
//                });
//            })
//            ->editColumn('driver_name', function ($item) {
//                return @$item->driver->full_name;
//            })
//            ->filterColumn('driver_name', function ($query, $keyword) {
//                $query->whereHas('driver', function ($query) use ($keyword) {
//                    $sql = "drivers.first_name  like ? OR drivers.last_name  like ?";
//                    $query->whereRaw($sql, ["%{$keyword}%", "%{$keyword}%"]);
//                });
//            })
//            ->editColumn('local_govt', function ($item) {
//                return @$item->driver->local_govt->name;
//            })
//            ->filterColumn('local_govt', function ($query, $keyword) {
//                $query->whereHas('driver.local_govt', function ($query) use ($keyword) {
//                    $sql = "lga.name  like ?";
//                    $query->whereRaw($sql, ["%{$keyword}%"]);
//                });
//            })

            ->editColumn('partial_amount', function ($item) {

                $start_date = session('start_date');
                $end_date = session('end_date');


                $payment = Payment::where('user_id', $item->user_id)
                    ->where(function ($q) use ($start_date, $end_date) {
                        $yest = Carbon::yesterday();
                        $today = Carbon::today();

                        if (!empty($start_date)) {
                            $start = Carbon::createFromFormat('m/d/Y', $start_date);
                            $start = $start->format('Y-m-d');
                            $q->whereDate('created_at', '>=', $start);

                        }
                        if (!empty($end_date)) {
                            $end = Carbon::createFromFormat('m/d/Y', $end_date);
                            $end = $end->format('Y-m-d');
                            $q->whereDate('created_at', '<=', $end);
                        }

                        if (empty($start_date) && empty($end_date)) {
                            $q->whereDate('created_at', $today);
                        }

                    })->get()->sum('partial_amount');


                return number_format(@$payment, 2);
            })
            ->editColumn('agent', function ($item) {
                return @$item->user->name;
            })
            ->editColumn('lga', function ($item) {
                $lg = @$item->user->biodata->lga_id;
                if (empty($lg)){
                    return '';
                }

                return Lga::find($lg)->name;
            })
            ->editColumn('agent_id', function ($item) {
                $lg = @$item->user->id;
                if (empty($lg)){
                    return '';
                }

                return Biodata::where('data_id',$lg)->name;
            })
            ->filterColumn('agent', function ($query, $keyword) {
                $query->whereHas('user', function ($query) use ($keyword) {
                    $sql = "users.name  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                });
            })
            ->editColumn('time', function ($__res) {
                return $__res->created_at->format('h:i a');
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
        $start_date = session('start_date');
        $end_date = session('end_date');

        $yest = Carbon::yesterday();
        $today = Carbon::today();
        $query = $model->newQuery();

        if (!empty($start_date)) {
            $start = Carbon::createFromFormat('m/d/Y', $start_date);
            $start = $start->format('Y-m-d');
            $query->whereDate('created_at', '>=', $start);

        }
        if (!empty($end_date)) {
            $end = Carbon::createFromFormat('m/d/Y', $end_date);
            $end = $end->format('Y-m-d');
            $query->whereDate('created_at', '<=', $end);
        }

        if (empty($start_date) && empty($end_date)) {
            $query->whereDate('created_at', $today);
        }

        return $query->groupBy('user_id');
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
            ['title' => 'Agent ID', 'data' => 'agent_id', 'footer' => 'agent id', 'orderable' => false],
            ['title' => 'LGA', 'data' => 'lga', 'footer' => 'LGA', 'orderable' => false],
            //['title' => 'Vehicle Type', 'data' => 'vehicle_type_id', 'footer' => 'vehicle_type_id'],
            // ['title' => 'Time', 'data' => 'time', 'footer' => 'time', 'searchable' => false],
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
