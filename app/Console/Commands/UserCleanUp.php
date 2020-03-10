<?php

namespace App\Console\Commands;

use App\Models\Agent;
use App\Models\Collector;
use App\Models\Drivers;
use App\Models\Enforcer;
use Illuminate\Console\Command;

class UserCleanUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $deletedAgents = Agent::withoutGlobalScopes()->onlyTrashed()->get();
        foreach ($deletedAgents as $each){
            $each->biodata()->delete();
            $each->user()->delete();
        }

        $deletedCollector = Collector::withoutGlobalScopes()->onlyTrashed()->get();
        foreach ($deletedCollector as $each){
            $each->biodata()->delete();
            $each->user()->delete();
        }

        $deletedCollector = Enforcer::withoutGlobalScopes()->onlyTrashed()->get();
        foreach ($deletedCollector as $each){
            $each->user()->delete();
        }
    }
}
