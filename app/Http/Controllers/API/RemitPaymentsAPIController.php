<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRemitPaymentsAPIRequest;
use App\Http\Requests\API\UpdateRemitPaymentsAPIRequest;
use App\Models\RemitPayments;
use App\Repositories\RemitPaymentsRepository;
use App\Traits\Errors;
use App\Traits\FormatInput;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Response;

/**
 * Class RemitPaymentsController
 * @package App\Http\Controllers\API
 */
class RemitPaymentsAPIController extends AppBaseController
{
    /** @var  RemitPaymentsRepository */
    private $remitPaymentsRepository;
    use Errors,FormatInput;
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

    public function __construct(RemitPaymentsRepository $remitPaymentsRepo)
    {
        $this->remitPaymentsRepository = $remitPaymentsRepo;
    }

    /**
     * Display a listing of the RemitPayments.
     * GET|HEAD /remitPayments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $remitPayments = $this->remitPaymentsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($remitPayments->toArray(), 'Remit Payments retrieved successfully');
    }


    public function store()
    {
        $request = \request()->input();


        if (!isset($request['items'])) {
            $newRequest['items'] = [$request];
        } else {
            $newRequest['items'] = $request['items'];
        }
        $counter = 0;
        foreach ($newRequest['items'] as $eachRequest) {
            $allRequests[] = $eachRequest;
            $request = $eachRequest;

//            $this->formatLga2($request);
//            $request = $this->inputFormatted;
//            $this->formatAgent($request);
//            $request = $this->inputFormatted;
//            $this->formatCollector($request);
//            $request = $this->inputFormatted;


            $validator = Validator::make($request, RemitPayments::$rules);
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
                $remitPayments = $this->remitPaymentsRepository->create($eachRequest);
                $this->setSavedID($remitPayments->id);
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
        $remitPayments = RemitPayments::whereIn('id', $this->getSavedID())->get();
        return $this->sendResponse($remitPayments->toArray(), 'Remit Payments saved successfully');
    }

    /**
     * Display the specified RemitPayments.
     * GET|HEAD /remitPayments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RemitPayments $remitPayments */
        $remitPayments = $this->remitPaymentsRepository->find($id);

        if (empty($remitPayments)) {
            return $this->sendError('Remit Payments not found');
        }

        return $this->sendResponse($remitPayments->toArray(), 'Remit Payments retrieved successfully');
    }

    /**
     * Update the specified RemitPayments in storage.
     * PUT/PATCH /remitPayments/{id}
     *
     * @param int $id
     * @param UpdateRemitPaymentsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRemitPaymentsAPIRequest $request)
    {
        $input = $request->all();

        /** @var RemitPayments $remitPayments */
        $remitPayments = $this->remitPaymentsRepository->find($id);

        if (empty($remitPayments)) {
            return $this->sendError('Remit Payments not found');
        }

        $remitPayments = $this->remitPaymentsRepository->update($input, $id);

        return $this->sendResponse($remitPayments->toArray(), 'RemitPayments updated successfully');
    }

    /**
     * Remove the specified RemitPayments from storage.
     * DELETE /remitPayments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RemitPayments $remitPayments */
        $remitPayments = $this->remitPaymentsRepository->find($id);

        if (empty($remitPayments)) {
            return $this->sendError('Remit Payments not found');
        }

        $remitPayments->delete();

        return $this->sendSuccess('Remit Payments deleted successfully');
    }
}
