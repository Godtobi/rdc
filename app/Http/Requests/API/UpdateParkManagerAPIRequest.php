<?php

namespace App\Http\Requests\API;

use App\Models\ParkManager;
use InfyOm\Generator\Request\APIRequest;

class UpdateParkManagerAPIRequest extends APIRequest
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
        $rules = ParkManager::$rules;
        
        return $rules;
    }
}
