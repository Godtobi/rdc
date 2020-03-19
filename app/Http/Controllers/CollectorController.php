<?php

namespace App\Http\Controllers;

use App\DataTables\CollectorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCollectorRequest;
use App\Http\Requests\UpdateCollectorRequest;
use App\Models\Collector;
use App\Models\Lga;
use App\Models\User;
use App\Repositories\BiodataRepository;
use App\Repositories\CollectorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Response;

class CollectorController extends AppBaseController
{
    /** @var  CollectorRepository */
    private $collectorRepository;

    /** @var  BiodataRepository */
    private $biodataRepository;


    public function __construct(CollectorRepository $collectorRepo, BiodataRepository $biodataRepo)
    {
        $this->collectorRepository = $collectorRepo;
        $this->biodataRepository = $biodataRepo;
    }

    /**
     * Display a listing of the Collector.
     *
     * @param CollectorDataTable $collectorDataTable
     * @return Response
     */
    public function index(CollectorDataTable $collectorDataTable)
    {
        return $collectorDataTable->render('collectors.index');
    }

    /**
     * Show the form for creating a new Collector.
     *
     * @return Response
     */
    public function create()
    {
        $lga = Lga::all()->pluck('name', 'id');
        return view('collectors.create')->with(compact('lga'));
    }


    public function reset($id)
    {
        /** @var Agent $agent */
        $agent = $this->collectorRepository->find($id);
        if (empty($agent)) {
            return $this->sendError('Collector not found');
        }
        $agent->user->device_id = "";
        $agent->user->save();

        Flash::success('Collector Device Reset successfully');
        return redirect()->back();

    }


    /**
     * Store a newly created Collector in storage.
     *
     * @param CreateCollectorRequest $request
     *
     * @return Response
     */
    public function store(CreateCollectorRequest $request)
    {
        $input = $request->all();


        try {
            DB::beginTransaction();

            $validator = validator($request->input(), [
                'first_name' => 'required',
                'last_name' => 'required',
                //'userID' => 'required|exists:users,userID',
            ]);


            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $user = User::create([
                'name' => $input['first_name'] . " " . $input['last_name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            $user->assignRole('collector');
            $input['user_id'] = $user->id;


            $collector = $this->collectorRepository->create($input);

            $localGovt = $input['lga_id'];
            $resLGA = Lga::find($localGovt);

            $id = sprintf("%'04d", $collector->id);
            $driverID = "CYC" . $resLGA->lgaId . $id;
            $input['unique_code'] = $driverID;
            $input['data_id'] = $collector->id;
            $input['model'] = "Collector";

            $biodata = $this->biodataRepository->create($input);


            DB::commit();
            Flash::success('Collector saved successfully.');
        } catch (\Exception $exception) {
            DB::rollBack();
            Flash::error($exception->getMessage());
        }




        return redirect(route('collectors.index'));
    }

    /**
     * Display the specified Collector.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $collector = Collector::where('id', $id)->with('biodata')->first();

        if (empty($collector)) {
            Flash::error('Collector not found');

            return redirect(route('collectors.index'));
        }

        return view('collectors.show')->with('data', $collector);
    }

    /**
     * Show the form for editing the specified Collector.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //$collector = $this->collectorRepository->find($id);


        $lga = Lga::all()->pluck('name', 'id');
        $data = Collector::where('id', $id)->with('biodata')->first();


        if (empty($data)) {
            Flash::error('Collector not found');

            return redirect(route('collectors.index'));
        }

        return view('collectors.edit')->with(compact('data', 'lga'));
    }

    /**
     * Update the specified Collector in storage.
     *
     * @param  int $id
     * @param UpdateCollectorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCollectorRequest $request)
    {

        $collector = Collector::where('id', $id)->with('biodata')->first();
        if (empty($collector)) {
            Flash::error('Collector not found');

            return redirect(route('collectors.index'));
        }

        $collector = $this->collectorRepository->update($request->all(), $id);
        try {
            $biodata = $this->biodataRepository->update($request->all(), $collector->biodata->id);
        } catch (\Exception $exception) {

        }

        Flash::success('Collector updated successfully.');

        return redirect(route('collectors.index'));
    }

    /**
     * Remove the specified Collector from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $collector = $this->collectorRepository->find($id);

        if (empty($collector)) {
            Flash::error('Collector not found');

            return redirect(route('collectors.index'));
        }

        $this->collectorRepository->delete($id);
        $collector->biodata()->delete();
        $collector->user()->delete();

        Flash::success('Collector deleted successfully.');

        return redirect(route('collectors.index'));
    }
}
