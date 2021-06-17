<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSpecialization;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $specialization = $request->get('specialization');
        $perPage = 20;

        if (!empty($keyword)) {
            $doctors = Doctor::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('sub_specializations', 'LIKE', "%$keyword%")
                ->when($specialization, function ($query, $specialization) {
                    $query->where('specialization', $specialization);
                })
                ->latest()->paginate($perPage);
        } else {
            $doctors = Doctor::latest()
                ->when($specialization, function ($query, $specialization) {
                    $query->where('specialization', $specialization);
                })
                ->paginate($perPage);
        }

        $specializations = DoctorSpecialization::all();
        return view('search', compact('doctors', 'specializations'));
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
        $doctor = Doctor::findOrFail($id);
        $patient = Patient::where("user_id", Auth::id())->first();
        return view('doctor', compact('doctor', 'patient'));
    }
}
