<?php

namespace App\Http\Controllers;

use App\DataTables\ParkManagerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateParkManagerRequest;
use App\Http\Requests\UpdateParkManagerRequest;
use App\Repositories\ParkManagerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParkManagerController extends AppBaseController
{
    /** @var  ParkManagerRepository */
    private $parkManagerRepository;

    public function __construct(ParkManagerRepository $parkManagerRepo)
    {
        $this->parkManagerRepository = $parkManagerRepo;
    }

    /**
     * Display a listing of the ParkManager.
     *
     * @param ParkManagerDataTable $parkManagerDataTable
     * @return Response
     */
    public function index(ParkManagerDataTable $parkManagerDataTable)
    {
        return $parkManagerDataTable->render('park_managers.index');
    }

    /**
     * Show the form for creating a new ParkManager.
     *
     * @return Response
     */
    public function create()
    {
        return view('park_managers.create');
    }

    /**
     * Store a newly created ParkManager in storage.
     *
     * @param CreateParkManagerRequest $request
     *
     * @return Response
     */
    public function store(CreateParkManagerRequest $request)
    {
        $input = $request->all();

        $parkManager = $this->parkManagerRepository->create($input);

        Flash::success('Park Manager saved successfully.');

        return redirect(route('parkManagers.index'));
    }

    /**
     * Display the specified ParkManager.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parkManager = $this->parkManagerRepository->find($id);

        if (empty($parkManager)) {
            Flash::error('Park Manager not found');

            return redirect(route('parkManagers.index'));
        }

        return view('park_managers.show')->with('parkManager', $parkManager);
    }

    /**
     * Show the form for editing the specified ParkManager.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parkManager = $this->parkManagerRepository->find($id);

        if (empty($parkManager)) {
            Flash::error('Park Manager not found');

            return redirect(route('parkManagers.index'));
        }

        return view('park_managers.edit')->with('parkManager', $parkManager);
    }

    /**
     * Update the specified ParkManager in storage.
     *
     * @param  int              $id
     * @param UpdateParkManagerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParkManagerRequest $request)
    {
        $parkManager = $this->parkManagerRepository->find($id);

        if (empty($parkManager)) {
            Flash::error('Park Manager not found');

            return redirect(route('parkManagers.index'));
        }

        $parkManager = $this->parkManagerRepository->update($request->all(), $id);

        Flash::success('Park Manager updated successfully.');

        return redirect(route('parkManagers.index'));
    }

    /**
     * Remove the specified ParkManager from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parkManager = $this->parkManagerRepository->find($id);

        if (empty($parkManager)) {
            Flash::error('Park Manager not found');

            return redirect(route('parkManagers.index'));
        }

        $this->parkManagerRepository->delete($id);

        Flash::success('Park Manager deleted successfully.');

        return redirect(route('parkManagers.index'));
    }
}
