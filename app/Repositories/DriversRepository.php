<?php

namespace App\Repositories;

use App\Models\Drivers;
use App\Repositories\BaseRepository;

/**
 * Class DriversRepository
 * @package App\Repositories
 * @version February 13, 2020, 10:47 pm UTC
*/

class DriversRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Drivers::class;
    }
}
