<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Drivers
 * @package App\Models
 * @version February 13, 2020, 9:21 pm UTC
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
class Lga extends Model
{


    public $table = 'lga';


    public $fillable = [
        'name',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];


}
