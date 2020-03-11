<?php

namespace App\Http\Controllers;

use App\DataTables\AgentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\Agent;
use App\Models\Lga;
use App\Models\User;
use App\Repositories\AgentRepository;
use App\Repositories\BiodataRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Response;

class AgentController extends AppBaseController
{
    /** @var  AgentRepository */
    private $agentRepository;

    /** @var  BiodataRepository */
    private $biodataRepository;

    public function __construct(AgentRepository $agentRepo, BiodataRepository $biodataRepo)
    {
        $this->agentRepository = $agentRepo;
        $this->biodataRepository = $biodataRepo;
    }

    /**
     * Display a listing of the Agent.
     *
     * @param AgentDataTable $agentDataTable
     * @return Response
     */
    public function index(AgentDataTable $agentDataTable)
    {
        return $agentDataTable->render('agents.index');
    }

    /**
     * Show the form for creating a new Agent.
     *
     * @return Response
     */
    public function create()
    {
        $lga = Lga::all()->pluck('name', 'id');
        return view('agents.create')->with(compact('lga'));
    }

    /**
     * Store a newly created Agent in storage.
     *
     * @param CreateAgentRequest $request
     *
     * @return Response
     */
    public function store(CreateAgentRequest $request)
    {
        $input = $request->all();


        //dd($input);


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

            $user->assignRole('agents');
            $input['user_id'] = $user->id;


            $agent = $this->agentRepository->create($input);
            $localGovt = $input['lga_id'];
            $resLGA = Lga::find($localGovt);

            $id = sprintf("%'04d", $agent->id);
            $driverID = "CYA" . $resLGA->lgaId . $id;
            $input['unique_code'] = $driverID;
            $input['data_id'] = $agent->id;
            $input['model'] = "Agent";

            $biodata = $this->biodataRepository->create($input);


            DB::commit();
            Flash::success('Agent saved successfully.');
        } catch (\Exception $exception) {
            //dd($exception->getMessage(), $exception->getLine(),$exception->getFile());
            DB::rollBack();
            Flash::error($exception->getMessage());
        }

        return redirect(route('agents.index'));
    }

    /**
     * Display the specified Agent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$agent = $this->agentRepository->find($id);
        $agent = Agent::where('id', $id)->with('biodata')->first();

        if (empty($agent)) {
            Flash::error('Agent not found');

            return redirect(route('agents.index'));
        }

        return view('agents.show')->with('data', $agent);
    }


    public function reset($id)
    {
        /** @var Agent $agent */
        $agent = $this->agentRepository->find($id);
        if (empty($agent)) {
            return $this->sendError('Agent not found');
        }
        $agent->user->device_id = "";
        $agent->user->save();

        Flash::success('Agent Device Reset successfully');
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified Agent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lga = Lga::all()->pluck('name', 'id');
        $data = Agent::where('id', $id)->with('biodata')->first();
        // $agent = $agent->biodata;


        //$agent = $this->agentRepository->find($id);

        if (empty($data)) {
            Flash::error('Agent not found');

            return redirect(route('agents.index'));
        }

        return view('agents.edit')->with(compact('data', 'lga'));
    }

    /**
     * Update the specified Agent in storage.
     *
     * @param  int $id
     * @param UpdateAgentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgentRequest $request)
    {
        $agent = Agent::where('id', $id)->with('biodata')->first();

        if (empty($agent)) {
            Flash::error('Agent not found');

            return redirect(route('agents.index'));
        }

        $agent = $this->agentRepository->update($request->all(), $id);
        try {
            $biodata = $this->biodataRepository->update($request->all(), $agent->biodata->id);
        } catch (\Exception $exception) {

        }

        Flash::success('Agent updated successfully.');

        return redirect(route('agents.index'));
    }

    /**
     * Remove the specified Agent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agent = $this->agentRepository->find($id);

        if (empty($agent)) {
            Flash::error('Agent not found');

            return redirect(route('agents.index'));
        }

        $this->agentRepository->delete($id);
        $agent->biodata()->delete();
        $agent->user()->delete();
        Flash::success('Agent deleted successfully.');

        return redirect(route('agents.index'));
    }
}
