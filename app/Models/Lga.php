<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lga
 * @package App\Models
 * @version February 16, 2020, 5:29 pm UTC
 *
 * @property string name
 * @property integer state_id
 * @property string lgaId
 */
class Lga extends Model
{
    //use SoftDeletes;



    public $table = 'lga';
    public $timestamps = false;



    public $fillable = [
        'name',
        'state_id',
        'lgaId'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'state_id' => 'integer',
        'lgaId' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
