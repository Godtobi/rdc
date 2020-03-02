<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 * @package App\Models
 * @version February 18, 2020, 10:19 pm UTC
 *
 * @property string vehicle_plate_number
 * @property string driver_code
 * @property string vehicle_type_id
 * @property number amount
 */
class Payment extends Model
{
    use SoftDeletes;

    public $table = 'payments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'vehicle_plate_number',
        'driver_code',
        'vehicle_type_id',
        'user_id',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'vehicle_plate_number' => 'string',
        'user_id' => 'integer',
        'driver_code' => 'string',
        'vehicle_type_id' => 'string',
        'amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vehicle_plate_number' => 'required',
        'driver_code' => 'required',
        'vehicle_type_id' => 'required|exists:vehicle_type,id',
        'amount' => 'required'
    ];


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->user_id = auth()->user()->id;
        });
        self::saving(function ($model) {
            $model->user_id = auth()->user()->id;
        });
    }

    function getPartialAmountAttribute()
    {
        return ($this->attributes['amount'] * 90) / 100;
    }

    public function vehicle_type()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicle_type_id');
    }


    public function driver()
    {
        return $this->belongsTo('App\Models\Drivers', 'vehicle_plate_number', 'plate_no');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


}
