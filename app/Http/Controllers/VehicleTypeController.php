<?php

namespace App\Http\Controllers;

use App\DataTables\VehicleTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVehicleTypeRequest;
use App\Http\Requests\UpdateVehicleTypeRequest;
use App\Repositories\VehicleTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VehicleTypeController extends AppBaseController
{
    /** @var  VehicleTypeRepository */
    private $vehicleTypeRepository;

    public function __construct(VehicleTypeRepository $vehicleTypeRepo)
    {
        $this->vehicleTypeRepository = $vehicleTypeRepo;
    }

    /**
     * Display a listing of the VehicleType.
     *
     * @param VehicleTypeDataTable $vehicleTypeDataTable
     * @return Response
     */
    public function index(VehicleTypeDataTable $vehicleTypeDataTable)
    {
        return $vehicleTypeDataTable->render('vehicle_types.index');
    }

    /**
     * Show the form for creating a new VehicleType.
     *
     * @return Response
     */
    public function create()
    {
        return view('vehicle_types.create');
    }

    /**
     * Store a newly created VehicleType in storage.
     *
     * @param CreateVehicleTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateVehicleTypeRequest $request)
    {
        $input = $request->all();

        $vehicleType = $this->vehicleTypeRepository->create($input);

        Flash::success('Vehicle Type saved successfully.');

        return redirect(route('vehicleTypes.index'));
    }

    /**
     * Display the specified VehicleType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vehicleType = $this->vehicleTypeRepository->find($id);

        if (empty($vehicleType)) {
            Flash::error('Vehicle Type not found');

            return redirect(route('vehicleTypes.index'));
        }

        return view('vehicle_types.show')->with('vehicleType', $vehicleType);
    }

    /**
     * Show the form for editing the specified VehicleType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehicleType = $this->vehicleTypeRepository->find($id);

        if (empty($vehicleType)) {
            Flash::error('Vehicle Type not found');

            return redirect(route('vehicleTypes.index'));
        }

        return view('vehicle_types.edit')->with('vehicleType', $vehicleType);
    }

    /**
     * Update the specified VehicleType in storage.
     *
     * @param  int              $id
     * @param UpdateVehicleTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehicleTypeRequest $request)
    {
        $vehicleType = $this->vehicleTypeRepository->find($id);

        if (empty($vehicleType)) {
            Flash::error('Vehicle Type not found');

            return redirect(route('vehicleTypes.index'));
        }

        $vehicleType = $this->vehicleTypeRepository->update($request->all(), $id);

        Flash::success('Vehicle Type updated successfully.');

        return redirect(route('vehicleTypes.index'));
    }

    /**
     * Remove the specified VehicleType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehicleType = $this->vehicleTypeRepository->find($id);

        if (empty($vehicleType)) {
            Flash::error('Vehicle Type not found');

            return redirect(route('vehicleTypes.index'));
        }

        $this->vehicleTypeRepository->delete($id);

        Flash::success('Vehicle Type deleted successfully.');

        return redirect(route('vehicleTypes.index'));
    }
}
