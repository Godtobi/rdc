<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVehicleTypeAPIRequest;
use App\Http\Requests\API\UpdateVehicleTypeAPIRequest;
use App\Models\VehicleType;
use App\Repositories\VehicleTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VehicleTypeController
 * @package App\Http\Controllers\API
 */

class VehicleTypeAPIController extends AppBaseController
{
    /** @var  VehicleTypeRepository */
    private $vehicleTypeRepository;

    public function __construct(VehicleTypeRepository $vehicleTypeRepo)
    {
        $this->vehicleTypeRepository = $vehicleTypeRepo;
    }

    /**
     * Display a listing of the VehicleType.
     * GET|HEAD /vehicleTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $vehicleTypes = $this->vehicleTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($vehicleTypes->toArray(), 'Vehicle Types retrieved successfully');
    }

    /**
     * Store a newly created VehicleType in storage.
     * POST /vehicleTypes
     *
     * @param CreateVehicleTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVehicleTypeAPIRequest $request)
    {
        $input = $request->all();

        $vehicleType = $this->vehicleTypeRepository->create($input);

        return $this->sendResponse($vehicleType->toArray(), 'Vehicle Type saved successfully');
    }

    /**
     * Display the specified VehicleType.
     * GET|HEAD /vehicleTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VehicleType $vehicleType */
        $vehicleType = $this->vehicleTypeRepository->find($id);

        if (empty($vehicleType)) {
            return $this->sendError('Vehicle Type not found');
        }

        return $this->sendResponse($vehicleType->toArray(), 'Vehicle Type retrieved successfully');
    }

    /**
     * Update the specified VehicleType in storage.
     * PUT/PATCH /vehicleTypes/{id}
     *
     * @param int $id
     * @param UpdateVehicleTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehicleTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var VehicleType $vehicleType */
        $vehicleType = $this->vehicleTypeRepository->find($id);

        if (empty($vehicleType)) {
            return $this->sendError('Vehicle Type not found');
        }

        $vehicleType = $this->vehicleTypeRepository->update($input, $id);

        return $this->sendResponse($vehicleType->toArray(), 'VehicleType updated successfully');
    }

    /**
     * Remove the specified VehicleType from storage.
     * DELETE /vehicleTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VehicleType $vehicleType */
        $vehicleType = $this->vehicleTypeRepository->find($id);

        if (empty($vehicleType)) {
            return $this->sendError('Vehicle Type not found');
        }

        $vehicleType->delete();

        return $this->sendSuccess('Vehicle Type deleted successfully');
    }
}
