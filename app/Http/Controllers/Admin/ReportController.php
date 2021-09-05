<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Payment;
use Jimmyjs\ReportGenerator\Facades\PdfReportFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $doctors = Doctor::all();
        $payTypes = [
            "" => "All Payment Methods",
            "VISA" => "Visa Cards",
            "MASTER" => "Master Cards",
            "AMEX" => "Amex Cards",
            "EZCASH" => "Dialog Ez Cash",
            "MCASH" => "Mobitel MCash",
            "GENIE" => "Dialog Genie App",
            "VISHWA" => "Sampath Vishwa",
            "PAYAPP" => "Pay App",
            "HNB" => "Hatton National Bank",
            "FRIMI" => "Frimi App"
        ];
        return view('admin/reports.index', compact('doctors', 'payTypes'));
    }

    public function income(Request $request)
    {
        $fromDate = $request->input('from_date', '2021-06-16');
        $toDate = $request->input('to_date', '2021-06-16');
        $sortBy = $request->input('sort_by', 'prescriptions.created_at');
        $doctorId = $request->input('doctor_id', '');
        $payType = $request->input('pay_type_', '');

        $title = 'Income Report'; // Report title

        $meta = []; // For displaying filters description on header

        if ($fromDate == $toDate) {
            $meta["Date"] = $fromDate;
        } else {
            $meta['Date From'] = $fromDate . ' To ' . $toDate;
        }

        $doctor = Doctor::find($doctorId);
        $meta['Payment Method'] =  $payType ?? "All";
        $meta['Doctor'] =  $doctor ?  $doctor->first_name . " " . $doctor->last_name : "All";

        $queryBuilder =  Payment::leftJoin('prescriptions', 'prescriptions.id', '=', 'payments.prescription_id')
            ->leftJoin('doctors', 'doctors.id', '=', 'prescriptions.doctor_id')
            ->leftJoin('patients', 'patients.id', '=', 'prescriptions.patient_id')
            ->select(
                DB::raw('date(payments.created_at) as created_date'),
                'pay_type',
                DB::raw("CONCAT(doctors.first_name,' ',doctors.last_name) as doctor_name"),
                DB::raw("CONCAT(patients.first_name,' ',patients.last_name) as patient_name"),
                'amount',
            )
            ->whereBetween('payments.created_at', [$fromDate . " 00:00:00", $toDate . " 23:59:59"])
            ->when($doctor, function ($query) use ($doctor) {
                return $query->where('prescriptions.doctor_id', $doctor->id);
            })
            ->when($payType, function ($query) use ($payType) {
                return $query->where('pay_type', $payType);
            })
            ->orderBy($sortBy);

        $columns = [ // Set Column to be displayed
            'Date' => 'created_date',
            'Pyament Method' => 'pay_type',
            'Doctor' => 'doctor_name',
            'Patient' => 'patient_name',
            'Amount' => 'amount',
        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReportFacade::of($title, $meta, $queryBuilder, $columns)
            ->editColumn('Amount', [
                'class' => 'right bold',
                'displayAs' => function ($result) {
                    return $result->amount;
                }
            ])
            ->showTotal([ // Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
                'Amount' => 'point' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
            ])
            ->stream(); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }
}
