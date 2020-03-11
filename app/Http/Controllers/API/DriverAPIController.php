<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDriverAPIRequest;
use App\Http\Requests\API\UpdateDriverAPIRequest;
use App\Models\Drivers;
use App\Models\User;
use App\Repositories\DriverRepository;
use App\Traits\FormatInput;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Response;

/**
 * Class DriverController
 * @package App\Http\Controllers\API
 */
class DriverAPIController extends AppBaseController
{
    use FormatInput;
    /** @var  DriverRepository */
    private $driverRepository;

    public function __construct(DriverRepository $driverRepo)
    {
        $this->driverRepository = $driverRepo;
    }

    /**
     * Display a listing of the Driver.
     * GET|HEAD /drivers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $drivers = $this->driverRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($drivers->toArray(), 'Drivers retrieved successfully');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $keyword = $request->get('query');
        $tests = [];

        //dd($keyword);
        if (!empty($keyword)) {
            $tests = Drivers::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('middle_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->get()->toArray();
        }
        return $this->sendResponse($tests, 'Drivers retrieved successfully');

    }

    /**
     * Store a newly created Driver in storage.
     * POST /drivers
     *
     * @param CreateDriverAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDriverAPIRequest $request)
    {
        $this->formatVehicleType();
        $this->formatLga();
        $input = $this->inputFormatted;

        try {
            DB::beginTransaction();

            $validator = validator($request->input(), [
                'first_name' => 'required',
                'last_name' => 'required',
            ]);


            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $user = User::create([
                'name' => $input['first_name'] . " " . $input['last_name'],
                'email' => "",
                'password' => Hash::make($input['password']),
            ]);

            $user->assignRole('driver');
            $input['user_id'] = $user->id;

            //dd($input);


            if (isset($input['passport'])) {
                $file = $input['passport'];
                $fileName = time() . '-' . strtolower(str_replace(' ', '-', $file->getClientOriginalName()));
                Storage::disk('local')->getDriver()->put($fileName, $file->path(), ['ServerSideEncryption' => 'AES256']);
                $input['passport'] = $fileName;
            }
            if(empty($input['passport'])){
                $input['passport'] = "";
            }
            $input['driver_id'] = "";
            $driver = $this->driverRepository->create($input);


            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->sendError($exception->getMessage());
        }


        return $this->sendResponse($driver->toArray(), 'Driver saved successfully');
    }

    /**
     * Display the specified Driver.
     * GET|HEAD /drivers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Driver $driver */
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            return $this->sendError('Driver not found');
        }

        return $this->sendResponse($driver->toArray(), 'Driver retrieved successfully');
    }

    /**
     * Update the specified Driver in storage.
     * PUT/PATCH /drivers/{id}
     *
     * @param int $id
     * @param UpdateDriverAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriverAPIRequest $request)
    {
        $input = $request->all();

        /** @var Driver $driver */
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            return $this->sendError('Driver not found');
        }

        $driver = $this->driverRepository->update($input, $id);

        return $this->sendResponse($driver->toArray(), 'Driver updated successfully');
    }

    /**
     * Remove the specified Driver from storage.
     * DELETE /drivers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Driver $driver */
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            return $this->sendError('Driver not found');
        }

        $driver->delete();

        return $this->sendSuccess('Driver deleted successfully');
    }
}
