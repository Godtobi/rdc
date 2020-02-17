<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Enforcer
 * @package App\Models
 * @version February 17, 2020, 10:37 am UTC
 *
 * @property string first_name
 * @property string last_name
 * @property string phone
 * @property integer user_id
 * @property string email
 * @property string address
 * @property integer state_id
 * @property string marital_status
 * @property integer lga
 */
class Enforcer extends Model
{
    use SoftDeletes;

    public $table = 'enforcer';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'first_name',
        'last_name',
        'phone',
        'user_id',
        'email',
        'address',
        'state_id',
        'marital_status',
        'lga'
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
        'user_id' => 'integer',
        'email' => 'string',
        'address' => 'string',
        'state_id' => 'integer',
        'marital_status' => 'string',
        'lga' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id');
    }

    public function local_govt()
    {
        return $this->belongsTo('App\Models\Lga', 'lga');
    }


}
