<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserDetails
 * @package App\Models
 * @version February 17, 2020, 10:59 am UTC
 *
 * @property string first_name
 * @property integer user_id
 * @property string last_name
 * @property string phone
 * @property string picture
 */
class UserDetails extends Model
{
    use SoftDeletes;

    public $table = 'user_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'user_id',
        'last_name',
        'phone',
        'picture'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'user_id' => 'integer',
        'last_name' => 'string',
        'phone' => 'string',
        'picture' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    
}
