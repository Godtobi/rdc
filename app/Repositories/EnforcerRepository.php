<?php

namespace App\Repositories;

use App\Models\Enforcer;
use App\Repositories\BaseRepository;

/**
 * Class EnforcerRepository
 * @package App\Repositories
 * @version February 17, 2020, 10:37 am UTC
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
        'user_id',
        'email',
        'address',
        'state_id',
        'marital_status',
        'lga'
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
