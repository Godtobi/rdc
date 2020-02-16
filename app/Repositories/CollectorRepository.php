<?php

namespace App\Repositories;

use App\Models\Collector;
use App\Repositories\BaseRepository;

/**
 * Class CollectorRepository
 * @package App\Repositories
 * @version February 16, 2020, 2:23 pm UTC
*/

class CollectorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'phone',
        'user_id'
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
        return Collector::class;
    }
}
