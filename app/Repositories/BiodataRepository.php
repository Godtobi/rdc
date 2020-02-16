<?php

namespace App\Repositories;

use App\Models\Biodata;
use App\Repositories\BaseRepository;

/**
 * Class BiodataRepository
 * @package App\Repositories
 * @version February 16, 2020, 8:48 pm UTC
*/

class BiodataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'data_id',
        'model',
        'unique_code',
        'tally_number',
        'email',
        'account_number',
        'medical_condition',
        'guarantor_name',
        'contact',
        'guarantor_address',
        'emergency_contact_name_1',
        'phone_no_1',
        'emergency_contact_name_2',
        'phone_no_2',
        'next_of_kin',
        'next_of_kin_address',
        'next_of_kin_phone',
        'pfa',
        'rsa_number',
        'job_title',
        'driver_lic_issuance_date',
        'driver_lic_expiry_date',
        'driver_lic_date',
        'dob',
        'sex',
        'bank',
        'spouse_name',
        'spouse_address',
        'spouse_phone',
        'employment_date',
        'lga_id',
        'bank_code',
        'bank_pfa_code',
        'driver_license_number',
        'pre_employment_test_result_date',
        'pre_employment_test_date',
        'salary'
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
        return Biodata::class;
    }
}
