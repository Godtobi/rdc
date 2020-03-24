<?php

namespace App\Http\Controllers;

use App\DataTables\CollectorRemitPaymentsDataTable;
use App\DataTables\RemitPaymentsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRemitPaymentsRequest;
use App\Http\Requests\UpdateRemitPaymentsRequest;
use App\Models\Collector;
use App\Repositories\RemitPaymentsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Response;

class RemitPaymentsController extends AppBaseController
{
    /** @var  RemitPaymentsRepository */
    private $remitPaymentsRepository;

    public function __construct(RemitPaymentsRepository $remitPaymentsRepo)
    {
        $this->remitPaymentsRepository = $remitPaymentsRepo;
    }

    /**
     * Display a listing of the RemitPayments.
     *
     * @param RemitPaymentsDataTable $remitPaymentsDataTable
     * @return Response
     */
    public function index(RemitPaymentsDataTable $remitPaymentsDataTable)
    {
        return $remitPaymentsDataTable->render('remit_payments.index');
    }

    /**
     * Show the form for creating a new RemitPayments.
     *
     * @return Response
     */
    public function create()
    {
        return view('remit_payments.create');
    }

    /**
     * Store a newly created RemitPayments in storage.
     *
     * @param CreateRemitPaymentsRequest $request
     *
     * @return Response
     */
    public function store(CreateRemitPaymentsRequest $request)
    {
        $input = $request->all();

        $remitPayments = $this->remitPaymentsRepository->create($input);

        Flash::success('Remit Payments saved successfully.');

        return redirect(route('remitPayments.index'));
    }

    /**
     * Display the specified RemitPayments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, CollectorRemitPaymentsDataTable $__DataTable)
    {

        $collector = Collector::whereHas('biodata', function ($q) use ($id) {
            $q->where('unique_code', $id);
        })->first();

        //dd($collector);
        if (empty($collector)) {
            Flash::error('Remit Payments not found');

            return redirect(route('remitPayments.index'));
        }

        $__DataTable->setCollector($collector);
        return $__DataTable->render('remit_payments.show', compact('collector'));
    }

    /**
     * Show the form for editing the specified RemitPayments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $remitPayments = $this->remitPaymentsRepository->find($id);

        if (empty($remitPayments)) {
            Flash::error('Remit Payments not found');

            return redirect(route('remitPayments.index'));
        }

        return view('remit_payments.edit')->with('remitPayments', $remitPayments);
    }

    /**
     * Update the specified RemitPayments in storage.
     *
     * @param  int $id
     * @param UpdateRemitPaymentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRemitPaymentsRequest $request)
    {
        $remitPayments = $this->remitPaymentsRepository->find($id);

        if (empty($remitPayments)) {
            Flash::error('Remit Payments not found');

            return redirect(route('remitPayments.index'));
        }

        $remitPayments = $this->remitPaymentsRepository->update($request->all(), $id);

        Flash::success('Remit Payments updated successfully.');

        return redirect(route('remitPayments.index'));
    }

    /**
     * Remove the specified RemitPayments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $remitPayments = $this->remitPaymentsRepository->find($id);

        if (empty($remitPayments)) {
            Flash::error('Remit Payments not found');

            return redirect(route('remitPayments.index'));
        }

        $this->remitPaymentsRepository->delete($id);

        Flash::success('Remit Payments deleted successfully.');

        return redirect(route('remitPayments.index'));
    }
}
