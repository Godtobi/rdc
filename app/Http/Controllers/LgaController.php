<?php

namespace App\Http\Controllers;

use App\DataTables\LgaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLgaRequest;
use App\Http\Requests\UpdateLgaRequest;
use App\Repositories\LgaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LgaController extends AppBaseController
{
    /** @var  LgaRepository */
    private $lgaRepository;

    public function __construct(LgaRepository $lgaRepo)
    {
        $this->lgaRepository = $lgaRepo;
    }

    /**
     * Display a listing of the Lga.
     *
     * @param LgaDataTable $lgaDataTable
     * @return Response
     */
    public function index(LgaDataTable $lgaDataTable)
    {
        return $lgaDataTable->render('lgas.index');
    }

    /**
     * Show the form for creating a new Lga.
     *
     * @return Response
     */
    public function create()
    {
        return view('lgas.create');
    }

    /**
     * Store a newly created Lga in storage.
     *
     * @param CreateLgaRequest $request
     *
     * @return Response
     */
    public function store(CreateLgaRequest $request)
    {
        $input = $request->all();

        $lga = $this->lgaRepository->create($input);

        Flash::success('Lga saved successfully.');

        return redirect(route('lgas.index'));
    }

    /**
     * Display the specified Lga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lga = $this->lgaRepository->find($id);

        if (empty($lga)) {
            Flash::error('Lga not found');

            return redirect(route('lgas.index'));
        }

        return view('lgas.show')->with('lga', $lga);
    }

    /**
     * Show the form for editing the specified Lga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lga = $this->lgaRepository->find($id);

        if (empty($lga)) {
            Flash::error('Lga not found');

            return redirect(route('lgas.index'));
        }

        return view('lgas.edit')->with('lga', $lga);
    }

    /**
     * Update the specified Lga in storage.
     *
     * @param  int              $id
     * @param UpdateLgaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLgaRequest $request)
    {
        $lga = $this->lgaRepository->find($id);

        if (empty($lga)) {
            Flash::error('Lga not found');

            return redirect(route('lgas.index'));
        }

        $lga = $this->lgaRepository->update($request->all(), $id);

        Flash::success('Lga updated successfully.');

        return redirect(route('lgas.index'));
    }

    /**
     * Remove the specified Lga from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lga = $this->lgaRepository->find($id);

        if (empty($lga)) {
            Flash::error('Lga not found');

            return redirect(route('lgas.index'));
        }

        $this->lgaRepository->delete($id);

        Flash::success('Lga deleted successfully.');

        return redirect(route('lgas.index'));
    }
}
