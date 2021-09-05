<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pharmacy = Pharmacy::where("user_id", Auth::id())->first();
        $prescriptionOpen = Prescription::whereStatus('checked')->wherePharmacyId($pharmacy->id)->count();
        $prescriptionPacking = Prescription::whereStatus('packing')->wherePharmacyId($pharmacy->id)->count();
        $prescriptionDispatched = Prescription::whereStatus('dispatched')->wherePharmacyId($pharmacy->id)->count();
        $prescriptionDelivered = Prescription::whereStatus('delivered')->wherePharmacyId($pharmacy->id)->count();

        return view('pharmacy.dashboard', compact('prescriptionOpen', 'prescriptionPacking', 'prescriptionDispatched', 'prescriptionDelivered'));
    }
}
