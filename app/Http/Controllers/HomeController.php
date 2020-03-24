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
        $paymentTodayPart = Payment::where('created_at', '>=', $now->format("Y-m-d"))->get()->sum('partial_amount');


        $tenPercent = $paymentToday - $paymentTodayPart;


        $paymentYesterday = Payment::where('created_at', '>=', $yest->format("Y-m-d"))->get()->sum('amount');

        if ($paymentToday != 0) {
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
        return $driversDataTable->render('home', compact('drivers', 'tenPercent', 'agents', 'collectors', 'enforcers', 'diffPayment', 'paymentToday', 'projectedRev', 'diffProj'));
    }


    function date_search()
    {
        session()->remove('start_date');
        session()->remove('end_date');
        return redirect()->back();
    }

    function date_clear()
    {

        // dd(\request()->input()['start_date']);
        session()->put('start_date', \request()->input()['start_date']);
        session()->put('end_date', \request()->input()['end_date']);
        return redirect()->back();
        //$session = session('company_db');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DriversDataTable $driversDataTable)
    {


//        $start_date = session('start_date');
//        $end_date = session('end_date');
//
//        $payment = Payment::where('user_id', 80)
//            ->where(function ($q) use ($start_date, $end_date) {
//                $yest = Carbon::yesterday();
//                $today = Carbon::today();
//
//                if (!empty($start_date)) {
//                    $start = Carbon::createFromFormat('m/d/Y', $start_date);
//                    $start = $start->format('Y-m-d');
//                    $q->whereDate('created_at', '>=', $start);
//
//                }
//                if (!empty($end_date)) {
//                    $end = Carbon::createFromFormat('m/d/Y', $end_date);
//                    $end = $end->format('Y-m-d');
//                    $q->whereDate('created_at', '<=', $end);
//                }
//
//                if (empty($start_date) && empty($end_date)) {
//                    $q->whereDate('created_at', $yest);
//                }
//
//            })->get()->sum('partial_amount');
//
//
//
//        dd($payment);

        $now = Carbon::now();
        $yest = Carbon::yesterday();
        $paymentToday = Payment::whereDate('created_at', $now)->get()->sum('partial_amount');
//        $ee = Payment::whereDate('created_at', $yest)->count();
//        dd($ee);
//        $paymentToday__ = Payment::whereDate('created_at', $yest)->groupBy('user_id')->get();
//
//        dd($paymentToday__);


        $paymentYesterday = Payment::where('created_at', '>=', $yest->format("Y-m-d"))->get()->sum('partial_amount');

        if ($paymentToday != 0) {
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
