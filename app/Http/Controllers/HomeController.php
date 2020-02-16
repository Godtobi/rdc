<?php

namespace App\Http\Controllers;

use App\DataTables\DriversDataTable;
use App\Models\Agent;
use App\Models\Collector;
use App\Models\Drivers;
use App\Models\Enforcer;
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
    public function index(DriversDataTable $driversDataTable)
    {


        $drivers = Drivers::all()->count();
        $agents = Agent::all()->count();
        $collectors = Collector::all()->count();
        $enforcers = Enforcer::all()->count();
        return $driversDataTable->render('home', compact('drivers', 'agents', 'collectors', 'enforcers'));
    }
}
