<?php

namespace App\Repositories;

use App\Models\VehicleType;
use App\Repositories\BaseRepository;

/**
 * Class VehicleTypeRepository
 * @package App\Repositories
 * @version February 25, 2020, 3:23 pm UTC
*/

class VehicleTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'vehicleId',
        'amount'
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
        return VehicleType::class;
    }
}
