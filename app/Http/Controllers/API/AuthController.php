<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\ApiAuthRequest;
use App\Models\Biodata;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use AWS;
use Carbon\Carbon;

use Log;
use GuzzleHttp\Client;
use Illuminate\Validation\ValidationException;

class AuthController extends AppBaseController
{

    protected $successStatus = 200;


    public function verify_user()
    {
        $input = \request()->input();
        $validator = validator($input, [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError(implode(",", Arr::flatten($validator->errors()->toArray())));
        }

        $biodata = Biodata::where('unique_code', $input['user_id'])->first();
        if (empty($biodata)) {
            return $this->sendError('Invalid  information');
        }
        $user = User::where('email', $biodata->email)->first();

        $message = "Details";
        return $this->sendResponse($user, $message);

    }

    public function login(ApiAuthRequest $request)
    {

        $params = $request->validated();

        //dd($params);
        $biodata = Biodata::where('unique_code', $params['user_id'])->first();
        if (empty($biodata)) {
            return $this->sendError('Invalid login information');
        }
        $email = $biodata->email;
        if (Auth::attempt(['email' => $email, 'password' => $params['password']])) {
            $user = Auth::user();

            if (!empty($user->email_verified_at)) {
                return $this->sendError('You have been not verified your account');
            }

//            if (empty($user->device_id)) {
//                $user->device_id = $params['device_id'];
//                $user->save();
//            } else {
//                if ($user->device_id !== $params['device_id']) {
//                    return $this->sendError('Another Device has logged in with this account');
//                }
//            }

            $data['biodata'] = $user->biodata;
            if ($user->hasRole('agents')) {
                $data['biodata'] = $user->agent;

            }
            if ($user->hasRole('collector')) {
                $data['biodata'] = $user->collector;
            }
            if ($user->hasRole('enforcer')) {
                $data['biodata'] = $user->enforcer;
            }
            $data['user'] = $user;
            $data['token'] = $user->createToken(config('app.name'))->accessToken;
            $message = "Successfully Logged in";

            //return $data;
            //dd($user);
            return $this->sendResponse($data, $message);
        }
        return $this->sendError('Invalid login information');

    }


    public function logout()
    {
        Auth::guard()->logout();
        session()->flush();
        $message = "Successfully Logged out";
        return $this->sendResponse([], $message);
    }

    //params (old_password, new_password, token)
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "confirm_password" => "required|same:password",
            "old_password" => "required",
        ])->validate();


        // dd('f');

        $old_password = $request->input('old_password');
        $new_password = $request->input('password');


        $userObj = Auth::user();
        if (!Hash::check($old_password, $userObj->password)) {
            $message = "Your old password was not correct";
            return $this->sendError($message);
        }

        $userObj->password = Hash::make($new_password);
        $userObj->save();

//        //send pin as mail
//        $input['subject'] = config('app.name') . " Change Password Notification";
//        $input['email'] = $userObj->email;
//        $input['name'] = $userObj->name;
//
//
//        try {
//            Mail::to($this->isValidEmail($userObj->email))->send(new ChangePassword($input));
//        } catch (\Exception $e) {
//            return $this->sendError($e->getMessage());
//        }

        $message = "Password Updated was Successful";
        return $this->sendResponse([], $message);
    }


    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
                "confirm_password" => "required|same:new_password"]
        )->validate();


        $new_password = $request->input('new_password');
        $password_reset_code = $request->input('password_reset_code');
        $verification_code = $request->input('code');
        if (!empty($verification_code)) {

            $user = User::whereVerification_code($verification_code)->get();
            if (!$user->isEmpty()) {
                $user = $user->first();
                if (Hash::check($password_reset_code, $user->password_reset_code)) {
                    $user->password = bcrypt($new_password);
                    $user->save();

                    $message = "Password Updated was Successful";
                    return response()->json(compact('message'));
                } else {
                    $message = "Reset code is not correct";
                    return response()->json(compact('message'), 401);
                }
            } else {
                return response()->json(["message" => 'Verification password incorrect'], 401);
            }

        } else {
            $message = "Something went wrong. Try again";
            return response()->json(compact('message'), 401);
        }
    }


}
