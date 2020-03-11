<?php

namespace App\Http\Controllers;

use App\DataTables\UserDetailsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserDetailsRequest;
use App\Http\Requests\UpdateUserDetailsRequest;
use App\Repositories\UserDetailsRepository;
use App\Models\User;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Response;
use Spatie\Permission\Models\Role;

class UserDetailsController extends AppBaseController
{
    /** @var  UserDetailsRepository */
    private $userDetailsRepository;

    public function __construct(UserDetailsRepository $userDetailsRepo)
    {
        $this->userDetailsRepository = $userDetailsRepo;
    }

    /**
     * Display a listing of the UserDetails.
     *
     * @param UserDetailsDataTable $userDetailsDataTable
     * @return Response
     */
    public function index(UserDetailsDataTable $userDetailsDataTable)
    {
        return $userDetailsDataTable->render('user_details.index');
    }

    /**
     * Show the form for creating a new UserDetails.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('title', 'name');
        return view('user_details.create')->with(compact('roles'));
    }

    /**
     * Store a newly created UserDetails in storage.
     *
     * @param CreateUserDetailsRequest $request
     *
     * @return Response
     */
    public function store(CreateUserDetailsRequest $request)
    {
        $input = $request->all();


        //dd($input);


        try {
            DB::beginTransaction();

            $validator = validator($request->input(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',

            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $user = User::create([
                'name' => $input['first_name'] . " " . $input['last_name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);


            $input['user_id'] = $user->id;
            if (isset($input['picture'])) {
                $file = $input['picture'];
                $fileName = time() . '-' . strtolower(str_replace(' ', '-', $file->getClientOriginalName()));
                Storage::disk('local')->getDriver()->put($fileName, $file->path(), ['ServerSideEncryption' => 'AES256']);
                $input['picture'] = $fileName;
            }

            $userDetails = $this->userDetailsRepository->create($input);
            $user->assignRole($input['role_id']);
            DB::commit();
            Flash::success('User Details saved successfully.');
        } catch (\Exception $exception) {
            DB::rollBack();
            Flash::error($exception->getMessage());
        }
        return redirect(route('userDetails.index'));
    }

    /**
     * Display the specified UserDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userDetails = $this->userDetailsRepository->find($id);

        if (empty($userDetails)) {
            Flash::error('User Details not found');

            return redirect(route('userDetails.index'));
        }

        return view('user_details.show')->with('userDetails', $userDetails);
    }

    /**
     * Show the form for editing the specified UserDetails.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roles = Role::all()->pluck('title', 'name');
        $userDetails = $this->userDetailsRepository->find($id);

        if (empty($userDetails)) {
            Flash::error('User Details not found');

            return redirect(route('userDetails.index'));
        }

        return view('user_details.edit')->with(compact('userDetails', 'roles'));
    }

    /**
     * Update the specified UserDetails in storage.
     *
     * @param  int $id
     * @param UpdateUserDetailsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserDetailsRequest $request)
    {
        $userDetails = $this->userDetailsRepository->find($id);

        if (empty($userDetails)) {
            Flash::error('User Details not found');

            return redirect(route('userDetails.index'));
        }

        $userDetails = $this->userDetailsRepository->update($request->all(), $id);

        Flash::success('User Details updated successfully.');

        return redirect(route('userDetails.index'));
    }

    /**
     * Remove the specified UserDetails from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userDetails = $this->userDetailsRepository->find($id);

        if (empty($userDetails)) {
            Flash::error('User Details not found');

            return redirect(route('userDetails.index'));
        }

        $this->userDetailsRepository->delete($id);

        Flash::success('User Details deleted successfully.');

        return redirect(route('userDetails.index'));
    }
}
