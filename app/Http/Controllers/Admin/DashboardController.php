<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Prescription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $doctorToday = Doctor::whereDate('created_at', DB::raw('CURDATE()'))->count();
        $doctorTotal = Doctor::count();

        $patientToday = Patient::whereDate('created_at', DB::raw('CURDATE()'))->count();
        $patientTotal = Patient::count();

        $prescriptionToday = Prescription::whereDate('created_at', DB::raw('CURDATE()'))->count();
        $prescriptionTotal = Prescription::count();

        $pharmacyToday = Pharmacy::whereDate('created_at', DB::raw('CURDATE()'))->count();
        $pharmacyTotal = Pharmacy::count();

        return view('admin.dashboard', compact('doctorToday', 'doctorTotal', 'patientToday', 'patientTotal', 'prescriptionToday', 'prescriptionTotal', 'pharmacyToday', 'pharmacyTotal'));
    }
}
