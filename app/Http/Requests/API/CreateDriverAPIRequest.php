<?php

namespace App\Http\Requests\API;

use App\Models\Drivers;
use InfyOm\Generator\Request\APIRequest;

class CreateDriverAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'middle_name' => 'required',
            'password' => 'required',
            'last_name' => 'required',
            'marital_status' => 'required',
            'state_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'plate_no' => 'required',
            'vehicle_type_id' => 'required',
            'mother_maiden_name' => 'required',
            'vehicle_owner_name' => 'required',
            'vehicle_owner_phone' => 'required',
            'lga' => 'required',
            'passport' => 'required'
        ];
    }
}
