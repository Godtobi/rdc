<?php

namespace App\Http\Controllers;

use App\DataTables\EnforcerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEnforcerRequest;
use App\Http\Requests\UpdateEnforcerRequest;
use App\Repositories\EnforcerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
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
        return view('enforcers.create');
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

        $enforcer = $this->enforcerRepository->create($input);

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

        if (empty($enforcer)) {
            Flash::error('Enforcer not found');

            return redirect(route('enforcers.index'));
        }

        return view('enforcers.edit')->with('enforcer', $enforcer);
    }

    /**
     * Update the specified Enforcer in storage.
     *
     * @param  int              $id
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
