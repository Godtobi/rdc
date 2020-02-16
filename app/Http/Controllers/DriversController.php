<?php

namespace App\Http\Controllers;

use App\DataTables\DriversDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDriversRequest;
use App\Http\Requests\UpdateDriversRequest;
use App\Models\Lga;
use App\Models\State;
use App\Models\VehicleType;
use App\Repositories\DriversRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Storage;
use Response;

class DriversController extends AppBaseController
{
    /** @var  DriversRepository */
    private $driversRepository;

    public function __construct(DriversRepository $driversRepo)
    {
        $this->driversRepository = $driversRepo;
    }

    /**
     * Display a listing of the Drivers.
     *
     * @param DriversDataTable $driversDataTable
     * @return Response
     */
    public function index(DriversDataTable $driversDataTable)
    {
        return $driversDataTable->render('drivers.index');
    }

    /**
     * Show the form for creating a new Drivers.
     *
     * @return Response
     */
    public function create()
    {
        $lga = Lga::all()->pluck('name', 'id');
        $vehicleType = VehicleType::all()->pluck('name', 'id');
        $state = State::where('country_id', '160')->pluck('name', 'id');
        $marital = config('constants.marital');
        return view('drivers.create')->with(compact('lga', 'vehicleType', 'marital', 'state'));
    }

    /**
     * Store a newly created Drivers in storage.
     *
     * @param CreateDriversRequest $request
     *
     * @return Response
     */
    public function store(CreateDriversRequest $request)
    {
        $input = $request->all();

        $localGovt = $input['lga'];
        $vehicle = $input['vehicle_type_id'];
        $resLGA = Lga::find($localGovt);
        $resVehicle = VehicleType::find($vehicle);
        $driverID = "C-Y-D-" . $resLGA->lgaId . "-" . $resVehicle->vehicleId . "-" . GenerateRandomString(4, 'ALPHA');
        $input['driver_id'] = "";


        if (isset($input['passport'])) {
            $file = $input['passport'];
            $fileName = time() . '-' . strtolower(str_replace(' ', '-', $file->getClientOriginalName()));
            Storage::disk('local')->getDriver()->put($fileName, $file->path(), ['ServerSideEncryption' => 'AES256']);
            $input['passport'] = $fileName;
        }

        $drivers = $this->driversRepository->create($input);

        Flash::success('Drivers saved successfully.');

        return redirect(route('drivers.index'));
    }

    /**
     * Display the specified Drivers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $drivers = $this->driversRepository->find($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        return view('drivers.show')->with('drivers', $drivers);
    }

    /**
     * Show the form for editing the specified Drivers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lga = Lga::all()->pluck('name', 'id');
        $vehicleType = VehicleType::all()->pluck('name', 'id');
        $state = State::where('country_id', '160')->pluck('name', 'id');
        $marital = config('constants.marital');
        $drivers = $this->driversRepository->find($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        return view('drivers.edit')->with(compact('drivers', 'lga', 'vehicleType', 'state', 'marital'));
    }

    /**
     * Update the specified Drivers in storage.
     *
     * @param  int $id
     * @param UpdateDriversRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriversRequest $request)
    {
        $drivers = $this->driversRepository->find($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        $drivers = $this->driversRepository->update($request->all(), $id);

        Flash::success('Drivers updated successfully.');

        return redirect(route('drivers.index'));
    }

    /**
     * Remove the specified Drivers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $drivers = $this->driversRepository->find($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        $this->driversRepository->delete($id);

        Flash::success('Drivers deleted successfully.');

        return redirect(route('drivers.index'));
    }
}
