<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $doctor = Doctor::where("user_id", Auth::id())->first();

        $patientToday = Patient::whereDate('created_at', DB::raw('CURDATE()'))->count();

        $prescriptionOpen = Prescription::whereStatus('pending')->whereDoctorId($doctor->id)->count();

        $paymentsToday = Payment::leftJoin('prescriptions', 'prescriptions.id', '=', 'payments.prescription_id')
            ->leftJoin('doctors', 'doctors.id', '=', 'prescriptions.doctor_id')
            ->whereDate('payments.created_at', DB::raw('CURDATE()'))
            ->whereDoctorId($doctor->id)
            ->sum('amount');

        $paymentsMonthly = Payment::leftJoin('prescriptions', 'prescriptions.id', '=', 'payments.prescription_id')
            ->leftJoin('doctors', 'doctors.id', '=', 'prescriptions.doctor_id')
            ->whereMonth('payments.created_at', date('m'))
            ->whereDoctorId($doctor->id)
            ->sum('amount');

        return view('doctor.dashboard', compact('patientToday', 'prescriptionOpen', 'paymentsToday', 'paymentsMonthly'));
    }
}
