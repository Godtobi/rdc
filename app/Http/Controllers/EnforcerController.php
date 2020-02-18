<?php

namespace App\Http\Controllers;

use App\DataTables\EnforcerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEnforcerRequest;
use App\Http\Requests\UpdateEnforcerRequest;
use App\Models\Enforcer;
use App\Models\Lga;
use App\Models\State;
use App\Models\User;
use App\Repositories\EnforcerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Response;

class EnforcerController extends AppBaseController
{
    /** @var  EnforcerRepository */
    private $enforcerRepository;

    public function __construct(EnforcerRepository $enforcerRepo)
    {
        $this->enforcerRepository = $enforcerRepo;
    }

    /**
     * Display a listing of the Enforcer.
     *
     * @param EnforcerDataTable $enforcerDataTable
     * @return Response
     */
    public function index(EnforcerDataTable $enforcerDataTable)
    {
        return $enforcerDataTable->render('enforcers.index');
    }

    /**
     * Show the form for creating a new Enforcer.
     *
     * @return Response
     */
    public function create()
    {

        $lga = Lga::all()->pluck('name', 'id');
        $state = State::where('country_id', '160')->pluck('name', 'id');
        $marital = config('constants.marital');
        return view('enforcers.create')->with(compact('lga', 'state', 'marital'));
    }

    /**
     * Store a newly created Enforcer in storage.
     *
     * @param CreateEnforcerRequest $request
     *
     * @return Response
     */
    public function store(CreateEnforcerRequest $request)
    {
        $input = $request->all();



        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $input['first_name'] . " " . $input['last_name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            $user->assignRole('enforcer');
            $input['user_id'] = $user->id;


            $enforcer = $this->enforcerRepository->create($input);

            $localGovt = $input['lga_id'];
            $resLGA = Lga::find($localGovt);
            $id = sprintf("%'04d", $enforcer->id);
            $driverID = "CYE" . $resLGA->lgaId . $id;
            $input['unique_code'] = $driverID;

            $enforcer = $this->enforcerRepository->update($input, $enforcer->id);



            DB::commit();
            Flash::success('Collector saved successfully.');
        } catch (\Exception $exception) {
            DB::rollBack();
            Flash::error($exception->getMessage());
        }


        Flash::success('Enforcer saved successfully.');

        return redirect(route('enforcers.index'));
    }

    /**
     * Display the specified Enforcer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $enforcer = $this->enforcerRepository->find($id);

        if (empty($enforcer)) {
            Flash::error('Enforcer not found');

            return redirect(route('enforcers.index'));
        }

        return view('enforcers.show')->with('enforcer', $enforcer);
    }

    /**
     * Show the form for editing the specified Enforcer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $enforcer = $this->enforcerRepository->find($id);
        $lga = Lga::all()->pluck('name', 'id');
        $state = State::where('country_id', '160')->pluck('name', 'id');
        $marital = config('constants.marital');
        if (empty($enforcer)) {
            Flash::error('Enforcer not found');

            return redirect(route('enforcers.index'));
        }

        return view('enforcers.edit')->with(compact('enforcer', 'lga', 'state', 'marital'));
    }

    /**
     * Update the specified Enforcer in storage.
     *
     * @param  int $id
     * @param UpdateEnforcerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnforcerRequest $request)
    {
        $enforcer = $this->enforcerRepository->find($id);

        if (empty($enforcer)) {
            Flash::error('Enforcer not found');

            return redirect(route('enforcers.index'));
        }

        $enforcer = $this->enforcerRepository->update($request->all(), $id);

        Flash::success('Enforcer updated successfully.');

        return redirect(route('enforcers.index'));
    }

    /**
     * Remove the specified Enforcer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $enforcer = $this->enforcerRepository->find($id);

        if (empty($enforcer)) {
            Flash::error('Enforcer not found');

            return redirect(route('enforcers.index'));
        }

        $this->enforcerRepository->delete($id);

        Flash::success('Enforcer deleted successfully.');

        return redirect(route('enforcers.index'));
    }
}
