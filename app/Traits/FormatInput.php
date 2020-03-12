<?php

namespace App\Traits;


use App\Models\Lga;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Response;


trait FormatInput
{

    private $inputFormatted;

    function formatVehicleType()
    {
        $this->inputFormatted = request()->all();

        switch (strtolower($this->inputFormatted['vehicle_type_id'])) {
            case "taxi":
                    $this->inputFormatted['vehicle_type_id'] = "4";
                break;
            case "bus":
                    $this->inputFormatted['vehicle_type_id'] = "6";
                break;
            case "trucks":
                    $this->inputFormatted['vehicle_type_id'] = "8";
                break;

            default :
                break;

        }
    }


    function formatLga()
    {
        $lga = strtolower($this->inputFormatted['lga']);
        $lgaObj = Lga::where('name', $lga)->first();
        if (!empty($lgaObj)) {
            $this->inputFormatted['lga'] = $lgaObj->id;
        }
    }
}

