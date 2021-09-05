<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSpecialization;
use App\Models\Patient;
use App\Models\Pharmacy;
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
        $pharmacy = Pharmacy::where("user_id", Auth::id())->first();
        return view('pharmacy.profile.edit', compact('pharmacy'));
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
            'first_name' => 'required|max:20',
            'last_name' => 'max:20',
            'email' => 'required|email|max:60',
            'registration_number' => 'required|max:10',
            'email' => 'required|email|max:60',
            'pharmacy_name' => 'required|string|max:40',
            'contact_number' => 'required|digits:10',
            'pharmacy_phone' => 'required|digits:10',
            'fax_number' => 'nullable|numeric|digits:10'
        ]);
        $requestData = $request->all();

        $pharmacy = Pharmacy::where("user_id", Auth::id())->first();
        $pharmacy->update($requestData);

        return redirect('pharmacy/profile')->with('flash_message', 'Pharmacy updated!');
    }
}
