<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Pharmacy;
use App\Models\Prescription;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of the pending open prescriptions.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $doctor = Doctor::where('user_id', $user->id)->first();
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $prescriptions = Prescription::where('doctor_id', '=', $doctor->id)
                ->where('status', '=', 'pending')
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $prescriptions = Prescription::where('doctor_id', '=', $doctor->id)
                ->where('status', '=', 'pending')
                ->latest()->paginate($perPage);
        }
        return view('doctor/inquiries.index', compact('prescriptions'));
    }

    /**
     * Display a listing of the prescribed inquiries.
     *
     * @return \Illuminate\View\View
     */
    public function prescribed(Request $request)
    {
        $user = $request->user();
        $doctor = Doctor::where('user_id', $user->id)->first();
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $prescriptions = Prescription::where('doctor_id', '=', $doctor->id)
                ->where('status', '!=', 'pending')
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $prescriptions = Prescription::where('doctor_id', '=', $doctor->id)
                ->where('status', '!=', 'pending')
                ->latest()->paginate($perPage);
        }
        return view('doctor/inquiries.prescribed', compact('prescriptions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $prescription = Prescription::findOrFail($id);

        return view('doctor/inquiries.show', compact('prescription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $prescription = Prescription::findOrFail($id);
        $pharmacies = Pharmacy::all();
        return view('doctor/inquiries.edit', compact('prescription', 'pharmacies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'description' => 'required'
        ]);
        $requestData = $request->all();

        $prescription = Prescription::findOrFail($id);
        $prescription->update($requestData);

        return redirect('doctor/inquiries')->with('flash_message', 'Prescription updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Prescription::destroy($id);

        return redirect('admin/prescriptions')->with('flash_message', 'Prescription deleted!');
    }
}
