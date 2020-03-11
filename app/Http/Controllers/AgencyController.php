<?php

namespace App\Http\Controllers;

use App\DataTables\AgencyAgentDataTable;
use App\DataTables\AgencyDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAgencyRequest;
use App\Http\Requests\UpdateAgencyRequest;
use App\Models\Payment;
use App\Models\User;
use App\Repositories\AgencyRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Response;

class AgencyController extends AppBaseController
{
    /** @var  AgencyRepository */
    private $agencyRepository;

    public function __construct(AgencyRepository $agencyRepo)
    {
        $this->agencyRepository = $agencyRepo;
    }

    /**
     * Display a listing of the Agency.
     *
     * @param AgencyDataTable $agencyDataTable
     * @return Response
     */
    public function index(AgencyDataTable $agencyDataTable)
    {

//        $payment = new Payment();
//        $amount = $payment->IsAgencyAmount(1);
//        dd($amount);
        return $agencyDataTable->render('agencies.index');
    }

    /**
     * Show the form for creating a new Agency.
     *
     * @return Response
     */
    public function create()
    {
        return view('agencies.create');
    }

    /**
     * Store a newly created Agency in storage.
     *
     * @param CreateAgencyRequest $request
     *
     * @return Response
     */
    public function store(CreateAgencyRequest $request)
    {
        $input = $request->all();


        //dd($input);


        try {
            DB::beginTransaction();

            $validator = validator($request->input(), [
                'contact_name' => 'required',
                'contact_phone' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:users',

            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            $user->assignRole('agency');
            $input['user_id'] = $user->id;
            $agency = $this->agencyRepository->create($input);
            DB::commit();
            Flash::success('Agency saved successfully.');
        } catch (\Exception $exception) {
            DB::rollBack();
            Flash::error($exception->getMessage());
        }
        return redirect(route('agencies.index'));
    }

    /**
     * Display the specified Agency.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, AgencyAgentDataTable $agencyDataTable)
    {
        $agency = $this->agencyRepository->find($id);

        //dd($agency);
        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }
        $agencyDataTable->setAgency($agency);
        return $agencyDataTable->render('agencies.show',compact('agency'));

    }

    /**
     * Show the form for editing the specified Agency.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        return view('agencies.edit')->with('agency', $agency);
    }

    /**
     * Update the specified Agency in storage.
     *
     * @param  int $id
     * @param UpdateAgencyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgencyRequest $request)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        $agency = $this->agencyRepository->update($request->all(), $id);

        Flash::success('Agency updated successfully.');

        return redirect(route('agencies.index'));
    }

    /**
     * Remove the specified Agency from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agency = $this->agencyRepository->find($id);

        if (empty($agency)) {
            Flash::error('Agency not found');

            return redirect(route('agencies.index'));
        }

        $this->agencyRepository->delete($id);

        Flash::success('Agency deleted successfully.');

        return redirect(route('agencies.index'));
    }
}
