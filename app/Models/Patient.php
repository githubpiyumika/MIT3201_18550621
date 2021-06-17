<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patients';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'address', 'nic', 'email', 'contact_number', 'date_of_birth', 'weight', 'height', 'emergency_contact_name', 'emergency_contact_no', 'emergency_address', 'chicken_pox', 'measles', 'hepatitis_b', 'medical_problems', 'has_insurance', 'insuared_company', 'insuared_company_address', 'policy_number', 'expiary_date', 'allergies', 'regular_medications', 'user_id'];
}
