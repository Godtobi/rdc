<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21/05/2018
 * Time: 2:28 PM
 */


namespace App\Scopes;

use App\Models\Agent;
use App\Models\Message;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AgencyScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {

        $table = $model->getTable();
        $user = auth()->user();
        if ($user->hasAnyRole(['agency'])) {
            $agencyID = $user->agency->id;
            if (in_array($table, ['payments'])) {
                $agents = Agent::where('agency_id', $agencyID)->pluck('user_id', 'id');
                $builder
                    ->orderBy($table . '.created_at', 'desc')
                    ->whereIn('user_id', $agents);
            } else if (in_array($table, ['remit_payments'])) {
                $agents = Agent::where('agency_id', $agencyID)->pluck('user_id', 'id');
                $builder
                    ->orderBy($table . '.created_at', 'desc')
                    ->whereIn('agent_id', $agents);
            } else {
                $builder
                    ->orderBy($table . '.created_at', 'desc')
                    ->where('agency_id', $agencyID);
            }


        }


    }


    /**
     * Extend the query builder with the needed functions.
     *
     * @param Builder $builder
     */
    public function extend(Builder $builder)
    {
        $builder->macro('allAgency', function (Builder $builder) {
            return $builder->withoutGlobalScope($this);
        });
    }
}
