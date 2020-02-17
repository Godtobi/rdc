<?php

namespace App\Repositories;

use App\Models\Drivers;
use App\Repositories\BaseRepository;

/**
 * Class DriverRepository
 * @package App\Repositories
 * @version February 17, 2020, 9:58 pm UTC
*/

class DriverRepository extends BaseRepository
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
        'driver_id',
        'marital_status',
        'state_id'
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
