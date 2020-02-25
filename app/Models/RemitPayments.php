<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RemitPayments
 * @package App\Models
 * @version February 18, 2020, 10:20 pm UTC
 *
 * @property string agent_id
 * @property string collector_id
 * @property string date
 * @property number amount
 */
class RemitPayments extends Model
{
    use SoftDeletes;

    public $table = 'remit_payments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'agent_id',
        'collector_id',
        'date',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'agent_id' => 'string',
        'collector_id' => 'string',
        'date' => 'date',
        'amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'agent_id' => 'required|exists:agents,id',
        'collector_id' => 'required|exists:collectors,id',
        'date' => 'required|date_format:Y-m-d',
        'amount' => 'required'
    ];

    function getPartialAmountAttribute()
    {
        return ($this->attributes['amount'] * 90) / 100;
    }

    public function agents()
    {
        return $this->belongsTo('App\Models\Agent', 'agent_id');
    }

    public function collectors()
    {
        return $this->belongsTo('App\Models\Collector', 'collector_id');
    }


}
