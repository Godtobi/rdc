<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParkManagerAPIRequest;
use App\Http\Requests\API\UpdateParkManagerAPIRequest;
use App\Models\ParkManager;
use App\Repositories\ParkManagerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParkManagerController
 * @package App\Http\Controllers\API
 */

class ParkManagerAPIController extends AppBaseController
{
    /** @var  ParkManagerRepository */
    private $parkManagerRepository;

    public function __construct(ParkManagerRepository $parkManagerRepo)
    {
        $this->parkManagerRepository = $parkManagerRepo;
    }

    /**
     * Display a listing of the ParkManager.
     * GET|HEAD /parkManagers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $parkManagers = $this->parkManagerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($parkManagers->toArray(), 'Park Managers retrieved successfully');
    }

    /**
     * Store a newly created ParkManager in storage.
     * POST /parkManagers
     *
     * @param CreateParkManagerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParkManagerAPIRequest $request)
    {
        $input = $request->all();

        $parkManager = $this->parkManagerRepository->create($input);

        return $this->sendResponse($parkManager->toArray(), 'Park Manager saved successfully');
    }

    /**
     * Display the specified ParkManager.
     * GET|HEAD /parkManagers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ParkManager $parkManager */
        $parkManager = $this->parkManagerRepository->find($id);

        if (empty($parkManager)) {
            return $this->sendError('Park Manager not found');
        }

        return $this->sendResponse($parkManager->toArray(), 'Park Manager retrieved successfully');
    }

    /**
     * Update the specified ParkManager in storage.
     * PUT/PATCH /parkManagers/{id}
     *
     * @param int $id
     * @param UpdateParkManagerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParkManagerAPIRequest $request)
    {
        $input = $request->all();

        /** @var ParkManager $parkManager */
        $parkManager = $this->parkManagerRepository->find($id);

        if (empty($parkManager)) {
            return $this->sendError('Park Manager not found');
        }

        $parkManager = $this->parkManagerRepository->update($input, $id);

        return $this->sendResponse($parkManager->toArray(), 'ParkManager updated successfully');
    }

    /**
     * Remove the specified ParkManager from storage.
     * DELETE /parkManagers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParkManager $parkManager */
        $parkManager = $this->parkManagerRepository->find($id);

        if (empty($parkManager)) {
            return $this->sendError('Park Manager not found');
        }

        $parkManager->delete();

        return $this->sendSuccess('Park Manager deleted successfully');
    }
}
