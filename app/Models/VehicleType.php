<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VehicleType
 * @package App\Models
 * @version February 13, 2020, 10:47 pm UTC
 *
 * @property string name
 * @property string description
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
        'vehicleId',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'vehicleId' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'vehicleId' => 'required',
    ];

    
}
