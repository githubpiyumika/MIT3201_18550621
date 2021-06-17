<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'doctors';

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
    protected $fillable = ['first_name', 'last_name', 'specialization', 'residential_address', 'institute_address', 'email', 'mobile', 'date_of_birth', 'gender', 'marital_status', 'nationality', 'professional_statement', 'education_qualiication', 'experience_after_graduation', 'registration_number', 'user_id', 'sub_specializations', 'curriculum'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function doctorSpecialization()
    {
        return $this->belongsTo('App\Models\DoctorSpecialization', 'specialization', 'id');
    }
}
