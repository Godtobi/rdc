<?php

namespace App\Http\Controllers;

use App\DataTables\CollectorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCollectorRequest;
use App\Http\Requests\UpdateCollectorRequest;
use App\Repositories\CollectorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CollectorController extends AppBaseController
{
    /** @var  CollectorRepository */
    private $collectorRepository;

    public function __construct(CollectorRepository $collectorRepo)
    {
        $this->collectorRepository = $collectorRepo;
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
        return view('collectors.create');
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

        $collector = $this->collectorRepository->create($input);

        Flash::success('Collector saved successfully.');

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
        $collector = $this->collectorRepository->find($id);

        if (empty($collector)) {
            Flash::error('Collector not found');

            return redirect(route('collectors.index'));
        }

        return view('collectors.show')->with('collector', $collector);
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
        $collector = $this->collectorRepository->find($id);

        if (empty($collector)) {
            Flash::error('Collector not found');

            return redirect(route('collectors.index'));
        }

        return view('collectors.edit')->with('collector', $collector);
    }

    /**
     * Update the specified Collector in storage.
     *
     * @param  int              $id
     * @param UpdateCollectorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCollectorRequest $request)
    {
        $collector = $this->collectorRepository->find($id);

        if (empty($collector)) {
            Flash::error('Collector not found');

            return redirect(route('collectors.index'));
        }

        $collector = $this->collectorRepository->update($request->all(), $id);

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

        Flash::success('Collector deleted successfully.');

        return redirect(route('collectors.index'));
    }
}
