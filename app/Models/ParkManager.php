<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ParkManager
 * @package App\Models
 * @version March 11, 2020, 10:13 pm UTC
 *
 * @property string firstname
 * @property string middlename
 * @property string lastname
 * @property string address
 * @property string phone
 * @property string maiden_name
 * @property string origin
 * @property string vehicle_type
 * @property string local_govt
 * @property string Parkmanager_id
 */
class ParkManager extends Model
{
    use SoftDeletes;

    public $table = 'park_manager';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'address',
        'phone',
        'maiden_name',
        'origin',
        'vehicle_type',
        'local_govt',
        'Parkmanager_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstname' => 'string',
        'middlename' => 'string',
        'lastname' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'maiden_name' => 'string',
        'origin' => 'string',
        'vehicle_type' => 'string',
        'local_govt' => 'string',
        'Parkmanager_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstname' => 'required',
        'middlename' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'maiden_name' => 'required',
        'origin' => 'required',
        'vehicle_type' => 'required',
        'local_govt' => 'required',
        'Parkmanager_id' => 'required'
    ];

    
}
