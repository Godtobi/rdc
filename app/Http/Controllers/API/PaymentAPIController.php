<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaymentAPIRequest;
use App\Http\Requests\API\UpdatePaymentAPIRequest;
use App\Models\Payment;
use App\Repositories\PaymentRepository;
use App\Traits\Errors;
use App\Traits\FormatInput;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Response;

/**
 * Class PaymentController
 * @package App\Http\Controllers\API
 */
class PaymentAPIController extends AppBaseController
{

    use Errors;
    use FormatInput;
    protected $saveErrors = [];
    protected $hasError = false;
    protected $savedID = [];

    /**
     * @return mixed
     */
    public function getSavedID()
    {
        return $this->savedID;
    }

    /**
     * @param mixed $savedID
     */
    public function setSavedID($savedID)
    {
        $this->savedID[] = $savedID;
    }

    /**
     * @return mixed
     */
    public function getSaveErrors()
    {
        return $this->saveErrors;
    }

    /**
     * @param mixed $saveErrors
     */
    public function setSaveErrors($saveErrors): void
    {
        $this->saveErrors[] = $saveErrors;
    }

    /** @var  PaymentRepository */
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepo)
    {
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the Payment.
     * GET|HEAD /payments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $payments = $this->paymentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($payments->toArray(), 'Payments retrieved successfully');
    }


    public function store()
    {

        $this->formatVehicleType();
        $request = $this->inputFormatted;

        if (!isset($request['items'])) {
            $newRequest['items'] = [$request];
        } else {
            $newRequest['items'] = $request['items'];
        }
        $counter = 0;
        foreach ($newRequest['items'] as $eachRequest) {
            $allRequests[] = $eachRequest;
            $request = $eachRequest;

            $validator = Validator::make($request, Payment::$rules);
            if ($validator->fails()) {
                $object = new \stdClass();
                $object->index = $counter;
                $object->errorMessage = $validator->errors()->all();
                $this->setSaveErrors($object);
                $this->hasError = true;
            }
            $counter++;
        }
        if (!empty($this->getSaveErrors()) || $this->hasError) {
            return $this->sendErrorWithData($this->getSaveErrors(), "There is an Error in your request", 400);
        }


        DB::beginTransaction();
        try {
            $newCounter = 0;
            foreach ($allRequests as $eachRequest) {
                $payment = $this->paymentRepository->create($eachRequest);
                $this->setSavedID($payment->id);
                $newCounter++;
            }
            if (!empty($this->getSaveErrors())) {
                return $this->sendErrorWithData($this->getSaveErrors(), "There is an Error in your request", 404);
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->sendError($exception->getMessage());
        }
        DB::commit();
        $payment = Payment::whereIn('id', $this->getSavedID())->get();
        return $this->sendResponse($payment->toArray(), 'Payment saved successfully');
    }

    /**
     * Display the specified Payment.
     * GET|HEAD /payments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Payment $payment */
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            return $this->sendError('Payment not found');
        }

        return $this->sendResponse($payment->toArray(), 'Payment retrieved successfully');
    }

    /**
     * Update the specified Payment in storage.
     * PUT/PATCH /payments/{id}
     *
     * @param int $id
     * @param UpdatePaymentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Payment $payment */
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            return $this->sendError('Payment not found');
        }

        $payment = $this->paymentRepository->update($input, $id);

        return $this->sendResponse($payment->toArray(), 'Payment updated successfully');
    }

    /**
     * Remove the specified Payment from storage.
     * DELETE /payments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Payment $payment */
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            return $this->sendError('Payment not found');
        }

        $payment->delete();

        return $this->sendSuccess('Payment deleted successfully');
    }
}
