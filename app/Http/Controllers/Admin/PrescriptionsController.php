<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $prescriptions = Prescription::where('patient_id', 'LIKE', "%$keyword%")
                ->orWhere('doctor_id', 'LIKE', "%$keyword%")
                ->orWhere('pharmacy_id', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $prescriptions = Prescription::latest()->paginate($perPage);
        }

        return view('admin/prescription.prescriptions.index', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin/prescription.prescriptions.create');
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
			'doctor_id' => 'required'
		]);
        $requestData = $request->all();
        
        Prescription::create($requestData);

        return redirect('admin/prescriptions')->with('flash_message', 'Prescription added!');
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

        return view('admin/prescription.prescriptions.show', compact('prescription'));
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

        return view('admin/prescription.prescriptions.edit', compact('prescription'));
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

        return redirect('admin/prescriptions')->with('flash_message', 'Prescription updated!');
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
