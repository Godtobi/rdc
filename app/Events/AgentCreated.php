<?php

namespace App\Events;


use App\Models\Agent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class AgentCreated
{
    public $user;
    private $agentModel;

    public function __construct(Agent $model)
    {

        $this->agentModel = $model;



    }


}
