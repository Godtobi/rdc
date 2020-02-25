<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Collector
 * @package App\Models
 * @version February 16, 2020, 2:23 pm UTC
 *
 * @property string first_name
 * @property string last_name
 * @property string phone
 * @property integer user_id
 */
class Collector extends Model
{
    use SoftDeletes;

    public $table = 'collectors';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'last_name',
        'phone',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'phone' => 'string',
        'user_id' => 'integer'
    ];

    function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . " " . $this->attributes['last_name'];
    }
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function biodata()
    {
        return $this->hasOne('App\Models\Biodata', 'data_id')->where('model', 'Collector');
    }


}
