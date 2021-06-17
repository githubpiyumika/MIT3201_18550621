<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prescriptions';

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
    protected $fillable = ['patient_id', 'doctor_id', 'pharmacy_id', 'description', 'status', 'patient_note'];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }
    public function pharmacy()
    {
        return $this->belongsTo('App\Models\Pharmacy');
    }
}
