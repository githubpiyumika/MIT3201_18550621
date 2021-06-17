<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
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
        $patient = Patient::where('user_id', $user->id)->first();
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $prescriptions = Prescription::where('patient_id', '=', $patient->id)
                //->where('status', '=', 'pending')
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $prescriptions = Prescription::where('patient_id', '=', $patient->id)
                //->where('status', '=', 'pending')
                ->latest()->paginate($perPage);
        }


        return view('patient/inquiries.index', compact('prescriptions'));
    }


    public function confirmed()
    {
        return view('patient/inquiries.confirmed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'patient_note' => 'required'
        ]);
        $requestData = $request->all();


        Prescription::create($requestData);

        return redirect()->route('patient.inquiries.confirmed')->with('flash_message', 'Prescription added!');
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
            'doctor_id' => 'required'
        ]);
        $requestData = $request->all();

        $prescription = Prescription::findOrFail($id);
        $prescription->update($requestData);

        return redirect('doctor/inquiries')->with('flash_message', 'Prescription updated!');
    }
}
