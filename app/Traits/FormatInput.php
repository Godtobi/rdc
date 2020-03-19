<?php

namespace App\Traits;


use App\Models\Agent;
use App\Models\Biodata;
use App\Models\Collector;
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


    function formatLga2($req)
    {
        $lga = strtolower($req['lga']);
        $lgaObj = Lga::where('name', $lga)->first();
        $this->inputFormatted = $req;
        if (!empty($lgaObj)) {
            $this->inputFormatted['lga'] = $lgaObj->id;
        }

    }

    function formatAgent($req)
    {
        $agent_id = $req['agent_id'];
        $res = Agent::whereHas('biodata', function ($q) use ($agent_id) {
            $q->where('unique_code', $agent_id);
        })->first();
        $this->inputFormatted = $req;
        if (!empty($res)) {
            $this->inputFormatted['agent_id'] = $res->id;
        }

    }


    function formatCollector($req)
    {
        $agent_id = $req['collector_id'];
        $res = Collector::whereHas('biodata', function ($q) use ($agent_id) {
            $q->where('unique_code', $agent_id);
        })->first();
        $this->inputFormatted = $req;
        if (!empty($res)) {
            $this->inputFormatted['collector_id'] = $res->id;
        }

    }
}

