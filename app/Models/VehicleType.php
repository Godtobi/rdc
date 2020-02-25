<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VehicleType
 * @package App\Models
 * @version February 25, 2020, 3:23 pm UTC
 *
 * @property string name
 * @property string description
 * @property string vehicleId
 * @property number amount
 */
class VehicleType extends Model
{
    use SoftDeletes;

    public $table = 'vehicle_type';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'vehicleId',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'vehicleId' => 'string',
        'amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'amount' => 'required'
    ];

    function getPartialAmountAttribute()
    {
        return ($this->attributes['amount'] * 90) / 100;
    }

    
}
