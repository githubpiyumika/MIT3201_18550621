<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view('doctor.patients.show', compact('patient'));
    }
}
