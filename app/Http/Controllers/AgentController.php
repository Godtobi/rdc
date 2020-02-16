<?php

namespace App\Http\Controllers;

use App\DataTables\AgentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\Agent;
use App\Models\Lga;
use App\Repositories\AgentRepository;
use App\Repositories\BiodataRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
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

        $agent = $this->agentRepository->create($input);
        $localGovt = $input['lga_id'];
        $resLGA = Lga::find($localGovt);

        $id = sprintf("%'04d", $agent->id);
        $driverID = "CYA" . $resLGA->lgaId . $id;
        $input['unique_code'] = $driverID;
        $input['data_id'] = $agent->id;
        $input['model'] = "Agent";

        $biodata = $this->biodataRepository->create($input);

        Flash::success('Agent saved successfully.');

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

    /**
     * Show the form for editing the specified Agent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agent = $this->agentRepository->find($id);

        if (empty($agent)) {
            Flash::error('Agent not found');

            return redirect(route('agents.index'));
        }

        return view('agents.edit')->with('agent', $agent);
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
        $agent = $this->agentRepository->find($id);

        if (empty($agent)) {
            Flash::error('Agent not found');

            return redirect(route('agents.index'));
        }

        $agent = $this->agentRepository->update($request->all(), $id);

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

        Flash::success('Agent deleted successfully.');

        return redirect(route('agents.index'));
    }
}
