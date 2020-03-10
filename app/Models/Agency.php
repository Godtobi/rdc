<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agency
 * @package App\Models
 * @version March 10, 2020, 5:38 pm UTC
 *
 * @property string name
 * @property string address
 * @property string contact_name
 * @property string contact_phone
 */
class Agency extends Model
{
    use SoftDeletes;

    public $table = 'agency';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'user_id',
        'address',
        'contact_name',
        'contact_phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'contact_name' => 'string',
        'contact_phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        'contact_name' => 'required',
        'contact_phone' => 'required'
    ];

    
}
