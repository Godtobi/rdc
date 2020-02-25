<?php

namespace App\Repositories;

use App\Models\RemitPayments;
use App\Repositories\BaseRepository;

/**
 * Class RemitPaymentsRepository
 * @package App\Repositories
 * @version February 25, 2020, 2:54 pm UTC
*/

class RemitPaymentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'agent_id',
        'collector_id',
        'date',
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
        return RemitPayments::class;
    }
}
