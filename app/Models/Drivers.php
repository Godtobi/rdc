<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Drivers
 * @package App\Models
 * @version February 13, 2020, 10:47 pm UTC
 *
 * @property string first_name
 * @property string middle_name
 * @property string last_name
 * @property string address
 * @property string phone
 * @property string plate_no
 * @property integer vehicle_type_id
 * @property string mother_maiden_name
 * @property string vehicle_owner_name
 * @property string vehicle_owner_phone
 * @property integer lga
 * @property string passport
 * @property string driver_id
 */
class Drivers extends Model
{
    use SoftDeletes;

    public $table = 'drivers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'phone',
        'plate_no',
        'vehicle_type_id',
        'mother_maiden_name',
        'vehicle_owner_name',
        'vehicle_owner_phone',
        'lga',
        'passport',
        'driver_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'middle_name' => 'string',
        'last_name' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'plate_no' => 'string',
        'vehicle_type_id' => 'integer',
        'mother_maiden_name' => 'string',
        'vehicle_owner_name' => 'string',
        'vehicle_owner_phone' => 'string',
        'lga' => 'integer',
        'passport' => 'string',
        'driver_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'plate_no' => 'required',
        'vehicle_type_id' => 'required',
        'mother_maiden_name' => 'required',
        'vehicle_owner_name' => 'required',
        'vehicle_owner_phone' => 'required',
        'lga' => 'required',
        'passport' => 'required'
    ];

    
}
