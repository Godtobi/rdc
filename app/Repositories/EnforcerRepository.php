<?php

namespace App\Repositories;

use App\Models\Enforcer;
use App\Repositories\BaseRepository;

/**
 * Class EnforcerRepository
 * @package App\Repositories
 * @version February 16, 2020, 2:26 pm UTC
*/

class EnforcerRepository extends BaseRepository
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
        return Enforcer::class;
    }
}