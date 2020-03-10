<?php

namespace App\Repositories;

use App\Models\Agency;
use App\Repositories\BaseRepository;

/**
 * Class AgencyRepository
 * @package App\Repositories
 * @version March 10, 2020, 5:38 pm UTC
*/

class AgencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'contact_name',
        'contact_phone'
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
        return Agency::class;
    }
}
