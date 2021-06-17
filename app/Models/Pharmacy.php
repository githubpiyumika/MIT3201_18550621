<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pharmacies';

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
    protected $fillable = ['first_name', 'last_name', 'registration_number', 'email', 'contact_number', 'address', 'pharmacy_name', 'pharmacy_address', 'pharmacy_city', 'pharmacy_phone', 'fax_number', 'user_id'];
}
