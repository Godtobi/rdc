<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Biodata
 * @package App\Models
 * @version February 16, 2020, 8:48 pm UTC
 *
 * @property integer data_id
 * @property string model
 * @property string unique_code
 * @property integer tally_number
 * @property string email
 * @property string account_number
 * @property string medical_condition
 * @property string guarantor_name
 * @property string contact
 * @property string guarantor_address
 * @property string emergency_contact_name_1
 * @property string phone_no_1
 * @property string emergency_contact_name_2
 * @property string phone_no_2
 * @property string next_of_kin
 * @property string next_of_kin_address
 * @property string next_of_kin_phone
 * @property string pfa
 * @property string rsa_number
 * @property string job_title
 * @property string driver_lic_issuance_date
 * @property string driver_lic_expiry_date
 * @property string driver_lic_date
 * @property string dob
 * @property string sex
 * @property string bank
 * @property string spouse_name
 * @property string spouse_address
 * @property string spouse_phone
 * @property string employment_date
 * @property integer lga_id
 * @property string bank_code
 * @property string bank_pfa_code
 * @property string driver_license_number
 * @property string pre_employment_test_result_date
 * @property string pre_employment_test_date
 * @property string salary
 */
class Biodata extends Model
{
    use SoftDeletes;

    public $table = 'biodata';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'data_id' => 'integer',
        'model' => 'string',
        'unique_code' => 'string',
        'tally_number' => 'integer',
        'email' => 'string',
        'account_number' => 'string',
        'medical_condition' => 'string',
        'guarantor_name' => 'string',
        'contact' => 'string',
        'guarantor_address' => 'string',
        'emergency_contact_name_1' => 'string',
        'phone_no_1' => 'string',
        'emergency_contact_name_2' => 'string',
        'phone_no_2' => 'string',
        'next_of_kin' => 'string',
        'next_of_kin_address' => 'string',
        'next_of_kin_phone' => 'string',
        'pfa' => 'string',
        'rsa_number' => 'string',
        'job_title' => 'string',
        'driver_lic_issuance_date' => 'string',
        'driver_lic_expiry_date' => 'string',
        'driver_lic_date' => 'string',
        'dob' => 'string',
        'sex' => 'string',
        'bank' => 'string',
        'spouse_name' => 'string',
        'spouse_address' => 'string',
        'spouse_phone' => 'string',
        'employment_date' => 'string',
        'lga_id' => 'integer',
        'bank_code' => 'string',
        'bank_pfa_code' => 'string',
        'driver_license_number' => 'string',
        'pre_employment_test_result_date' => 'string',
        'pre_employment_test_date' => 'string',
        'salary' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'data_id' => 'required',
        'model' => 'required',
        'unique_code' => 'required',
        'lga_id' => 'required'
    ];

    
}
