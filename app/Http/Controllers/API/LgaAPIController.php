<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLgaAPIRequest;
use App\Http\Requests\API\UpdateLgaAPIRequest;
use App\Models\Lga;
use App\Repositories\LgaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LgaController
 * @package App\Http\Controllers\API
 */

class LgaAPIController extends AppBaseController
{
    /** @var  LgaRepository */
    private $lgaRepository;

    public function __construct(LgaRepository $lgaRepo)
    {
        $this->lgaRepository = $lgaRepo;
    }

    /**
     * Display a listing of the Lga.
     * GET|HEAD /lgas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $lgas = $this->lgaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($lgas->toArray(), 'Lgas retrieved successfully');
    }

    /**
     * Store a newly created Lga in storage.
     * POST /lgas
     *
     * @param CreateLgaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLgaAPIRequest $request)
    {
        $input = $request->all();

        $lga = $this->lgaRepository->create($input);

        return $this->sendResponse($lga->toArray(), 'Lga saved successfully');
    }

    /**
     * Display the specified Lga.
     * GET|HEAD /lgas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Lga $lga */
        $lga = $this->lgaRepository->find($id);

        if (empty($lga)) {
            return $this->sendError('Lga not found');
        }

        return $this->sendResponse($lga->toArray(), 'Lga retrieved successfully');
    }

    /**
     * Update the specified Lga in storage.
     * PUT/PATCH /lgas/{id}
     *
     * @param int $id
     * @param UpdateLgaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLgaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Lga $lga */
        $lga = $this->lgaRepository->find($id);

        if (empty($lga)) {
            return $this->sendError('Lga not found');
        }

        $lga = $this->lgaRepository->update($input, $id);

        return $this->sendResponse($lga->toArray(), 'Lga updated successfully');
    }

    /**
     * Remove the specified Lga from storage.
     * DELETE /lgas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Lga $lga */
        $lga = $this->lgaRepository->find($id);

        if (empty($lga)) {
            return $this->sendError('Lga not found');
        }

        $lga->delete();

        return $this->sendSuccess('Lga deleted successfully');
    }
}
