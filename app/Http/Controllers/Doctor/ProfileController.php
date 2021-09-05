<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSpecialization;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $doctor = Doctor::where("user_id", Auth::id())->first();
        $doctorSpecializations =  DoctorSpecialization::all();
        return view('doctor.profile.edit', compact('doctor', 'doctorSpecializations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'mobile' => 'required|digits:10',
            'registration_number' => 'required',
            'professional_statement' => 'required',
        ]);
        $requestData = $request->all();

        $doctor = Doctor::where("user_id", Auth::id())->first();
        $doctor->update($requestData);

        return redirect('doctor/profile')->with('flash_message', 'Profile updated!');
    }
}
