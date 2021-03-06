<?php

namespace App\Repositories;

use App\Models\Lga;
use App\Repositories\BaseRepository;

/**
 * Class LgaRepository
 * @package App\Repositories
 * @version February 17, 2020, 10:30 pm UTC
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
