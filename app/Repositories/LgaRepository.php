<?php

namespace App\Repositories;

use App\Models\Lga;
use App\Repositories\BaseRepository;

/**
 * Class LgaRepository
 * @package App\Repositories
 * @version February 16, 2020, 5:29 pm UTC
*/

class LgaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'state_id',
        'lgaId'
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
        return Lga::class;
    }
}
