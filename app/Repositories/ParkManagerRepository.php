<?php

namespace App\Repositories;

use App\Models\ParkManager;
use App\Repositories\BaseRepository;

/**
 * Class ParkManagerRepository
 * @package App\Repositories
 * @version March 11, 2020, 10:13 pm UTC
*/

class ParkManagerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstname',
        'middlename',
        'lastname',
        'address',
        'phone',
        'maiden_name',
        'origin',
        'vehicle_type',
        'local_govt',
        'Parkmanager_id'
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
        return ParkManager::class;
    }
}
