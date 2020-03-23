<?php

namespace App\Http\Controllers;

use App\Charts\PaymentChart;
use App\DataTables\AgentPaymentDataTable;
use App\DataTables\PaymentDataTable;
use App\DataTables\PaymentDataTable2;
use App\Http\Requests;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Agent;
use App\Models\Payment;
use App\Repositories\PaymentRepository;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PaymentController extends AppBaseController
{
    /** @var  PaymentRepository */
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepo)
    {
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the Payment.
     *
     * @param PaymentDataTable $paymentDataTable
     * @return Response
     */
    public function index(PaymentDataTable $paymentDataTable)
    {
        $now = Carbon::now();
        $paymentToday = Payment::where('created_at', '>=', $now->format("Y-m-d"))->get()->sum('amount');
        return $paymentDataTable->render('payments.index', compact('paymentToday'));
    }


    public function report()
    {
        $data = collect([]); // Could also be an array
        $labels = collect([]); // Could also be an array

        for ($days_backwards = 15; $days_backwards >= 0; $days_backwards--) {
            $data->push(Payment::whereDate('created_at', today()->subDays($days_backwards))->sum('amount'));
            $labels->push(today()->subDays($days_backwards)->format("d M"));
        }

        $chart = new PaymentChart;
        $chart->labels($labels);
        $chart->dataset('REVENUE', 'line', $data)->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)");

        return view('payments.report', ['usersChart' => $chart]);
    }


    public function reportWeeks()
    {
        $data = collect([]); // Could also be an array
        $labels = collect([]); // Could also be an array

        for ($days_backwards = 15; $days_backwards >= 0; $days_backwards--) {
            $data->push(Payment::whereDate('created_at', today()->subWeeks($days_backwards))->sum('amount'));
            $labels->push(today()->subWeeks($days_backwards)->format("d M"));
        }

        $chart = new PaymentChart;
        $chart->labels($labels);
        $chart->dataset('REVENUE', 'line', $data)->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)");

        return view('payments.report', ['usersChart' => $chart]);
    }

    public function reportMonth()
    {
        $data = collect([]); // Could also be an array
        $labels = collect([]); // Could also be an array

        for ($days_backwards = 12; $days_backwards >= 0; $days_backwards--) {
            $data->push(Payment::whereDate('created_at', today()->subMonthsWithoutOverflow($days_backwards))->sum('amount'));
            $labels->push(today()->subMonthsWithoutOverflow($days_backwards)->format("d M"));
        }

        $chart = new PaymentChart;
        $chart->labels($labels);
        $chart->dataset('REVENUE', 'line', $data)->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)");

        return view('payments.report', ['usersChart' => $chart]);
    }

    public function report2()
    {
        return view('payments.report2');
    }

    /**
     * Show the form for creating a new Payment.
     *
     * @return Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created Payment in storage.
     *
     * @param CreatePaymentRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentRequest $request)
    {
        $input = $request->all();

        $payment = $this->paymentRepository->create($input);

        Flash::success('Payment saved successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Display the specified Payment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, AgentPaymentDataTable $__DataTable)
    {
        //$payment = $this->paymentRepository->find($id);

        $agent = Agent::where('user_id',$id)->first();
        if (empty($agent)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }
        $__DataTable->setAgent($agent);
        return $__DataTable->render('payments.show', compact('agent'));
    }

    /**
     * Show the form for editing the specified Payment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        return view('payments.edit')->with('payment', $payment);
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param  int $id
     * @param UpdatePaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentRequest $request)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $payment = $this->paymentRepository->update($request->all(), $id);

        Flash::success('Payment updated successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Remove the specified Payment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $this->paymentRepository->delete($id);

        Flash::success('Payment deleted successfully.');

        return redirect(route('payments.index'));
    }
}
