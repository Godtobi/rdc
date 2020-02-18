<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCollectorAPIRequest;
use App\Http\Requests\API\UpdateCollectorAPIRequest;
use App\Models\Collector;
use App\Repositories\CollectorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CollectorController
 * @package App\Http\Controllers\API
 */
class CollectorAPIController extends AppBaseController
{
    /** @var  CollectorRepository */
    private $collectorRepository;

    public function __construct(CollectorRepository $collectorRepo)
    {
        $this->collectorRepository = $collectorRepo;
    }

    /**
     * Display a listing of the Collector.
     * GET|HEAD /collectors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $collectors = $this->collectorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit'),
            ['*'],
            ['biodata']
        );

        return $this->sendResponse($collectors->toArray(), 'Collectors retrieved successfully');
    }

    /**
     * Store a newly created Collector in storage.
     * POST /collectors
     *
     * @param CreateCollectorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCollectorAPIRequest $request)
    {
        $input = $request->all();

        $collector = $this->collectorRepository->create($input);

        return $this->sendResponse($collector->toArray(), 'Collector saved successfully');
    }

    /**
     * Display the specified Collector.
     * GET|HEAD /collectors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Collector $collector */
        $collector = $this->collectorRepository->find($id);

        if (empty($collector)) {
            return $this->sendError('Collector not found');
        }

        return $this->sendResponse($collector->toArray(), 'Collector retrieved successfully');
    }

    /**
     * Update the specified Collector in storage.
     * PUT/PATCH /collectors/{id}
     *
     * @param int $id
     * @param UpdateCollectorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCollectorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Collector $collector */
        $collector = $this->collectorRepository->find($id);

        if (empty($collector)) {
            return $this->sendError('Collector not found');
        }

        $collector = $this->collectorRepository->update($input, $id);

        return $this->sendResponse($collector->toArray(), 'Collector updated successfully');
    }

    /**
     * Remove the specified Collector from storage.
     * DELETE /collectors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Collector $collector */
        $collector = $this->collectorRepository->find($id);

        if (empty($collector)) {
            return $this->sendError('Collector not found');
        }

        $collector->delete();

        return $this->sendSuccess('Collector deleted successfully');
    }
}
