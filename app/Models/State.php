<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
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
class State extends Model
{


    public $table = 'states';


    public $fillable = [
        'name',
        'country_id',
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


    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('nigeria', function (Builder $builder) {
            $builder->where('country_id', '160');
        });

    }



}
