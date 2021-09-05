<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function prescription()
    {
        return $this->belongsTo('App\Models\Prescription');
    }
}
