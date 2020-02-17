<?php

namespace App\Repositories;

use App\Models\UserDetails;
use App\Repositories\BaseRepository;

/**
 * Class UserDetailsRepository
 * @package App\Repositories
 * @version February 17, 2020, 10:59 am UTC
*/

class UserDetailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'user_id',
        'last_name',
        'phone',
        'picture'
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
        return UserDetails::class;
    }
}
