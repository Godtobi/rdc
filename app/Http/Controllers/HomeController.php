<?php

namespace App\Http\Controllers;

use App\DataTables\DriversDataTable;
use App\Models\Agent;
use App\Models\Collector;
use App\Models\Drivers;
use App\Models\Enforcer;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexs(DriversDataTable $driversDataTable)
    {



        $now = Carbon::now();
        $yest = Carbon::yesterday();
        $paymentToday = Payment::where('created_at', '>=', $now->format("Y-m-d"))->get()->sum('amount');
        $paymentYesterday = Payment::where('created_at', '>=', $yest->format("Y-m-d"))->get()->sum('amount');

        if ($paymentYesterday != 0) {
            $diffPayment = ($paymentToday - $paymentYesterday) * 100 / $paymentToday;
        } else {
            $diffPayment = 0;
        }
        $projectedRev = Drivers::whereHas('vehicle_type')->get()->sum('vehicle_type.amount');
        if ($projectedRev != 0) {
            $diffProj = ($projectedRev - $paymentToday) * 100 / $projectedRev;
        } else {
            $diffProj = 0;
        }


        //dd($diff);
        $drivers = Drivers::all()->count();
        $agents = Agent::all()->count();
        $collectors = Collector::all()->count();
        $enforcers = Enforcer::all()->count();
        return $driversDataTable->render('home', compact('drivers', 'agents', 'collectors', 'enforcers', 'diffPayment', 'paymentToday', 'projectedRev', 'diffProj'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DriversDataTable $driversDataTable)
    {
//        $ag = Agent::find(24);
//        dd($ag->user);

        $now = Carbon::now();
        $yest = Carbon::yesterday();
        $paymentToday = Payment::where('created_at', '>=', $now->format("Y-m-d"))->get()->sum('partial_amount');
        $paymentYesterday = Payment::where('created_at', '>=', $yest->format("Y-m-d"))->get()->sum('partial_amount');

        if ($paymentYesterday != 0) {
            $diffPayment = ($paymentToday - $paymentYesterday) * 100 / $paymentToday;
        } else {
            $diffPayment = 0;
        }
        $projectedRev = Drivers::whereHas('vehicle_type')->get()->sum('vehicle_type.partial_amount');
        if ($projectedRev != 0) {
            $diffProj = ($projectedRev - $paymentToday) * 100 / $projectedRev;
        } else {
            $diffProj = 0;
        }


        //dd($diff);
        $drivers = Drivers::all()->count();
        $agents = Agent::all()->count();
        $collectors = Collector::all()->count();
        $enforcers = Enforcer::all()->count();
        return $driversDataTable->render('home', compact('drivers', 'agents', 'collectors', 'enforcers', 'diffPayment', 'paymentToday', 'projectedRev', 'diffProj'));
    }
}
