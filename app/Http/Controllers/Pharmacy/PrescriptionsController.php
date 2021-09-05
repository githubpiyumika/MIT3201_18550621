<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, $status = "checked")
    {
        $pharmacy = Pharmacy::where("user_id", Auth::id())->first();
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $prescriptions = Prescription::where('patient_id', 'LIKE', "%$keyword%")
                ->where('status',  $status)
                ->where('status', "!=", "pending")
                ->wherePharmacyId($pharmacy->id)
                ->orWhere('id', 'LIKE', "%$keyword%")
                ->orWhereHas('doctor', function ($query) use ($keyword) {
                    $query->where('first_name', 'LIKE', "%$keyword%")
                        ->orWhere('last_name', 'LIKE', "%$keyword%")
                        ->orWhere('mobile', 'LIKE', "%$keyword%");
                })
                ->orWhereHas('patient', function ($query) use ($keyword) {
                    $query->where('first_name', 'LIKE', "%$keyword%")
                        ->orWhere('last_name', 'LIKE', "%$keyword%")
                        ->orWhere('contact_number', 'LIKE', "%$keyword%");
                })
                ->latest()->paginate($perPage);
        } else {
            $prescriptions = Prescription::where('status',  $status)
                ->latest()->paginate($perPage);
        }

        return view('pharmacy/prescriptions.index', compact('prescriptions', 'status'));
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
        $nextAction = $this->getNextAction($prescription->status);
        return view('pharmacy/prescriptions.show', compact('prescription', 'nextAction'));
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
        $prescription = Prescription::findOrFail($id);
        $prescription->status = $request->status;
        $prescription->update();

        return redirect()->back()->with('flash_message', 'Prescription updated!');
    }

    private function getNextAction($status)
    {
        if ($status == 'checked') {
            return [
                'status' => 'packing',
                'label' => 'Mark as Packing'
            ];
        } else if ($status == 'packing') {
            return [
                'status' => 'dispatched',
                'label' => 'Mark as Distpatched'
            ];
        } else if ($status == 'dispatched') {
            return [
                'status' => 'delivered',
                'label' => 'Mark as Delivered'
            ];
        } else if ($status == 'delivered') {
            return null;
        }
    }
}
