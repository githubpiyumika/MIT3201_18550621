<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Doctor;
use App\Models\DoctorSpecialization;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DoctorsController extends Controller
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
            $doctors = Doctor::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('specialization', 'LIKE', "%$keyword%")
                ->orWhere('residential_address', 'LIKE', "%$keyword%")
                ->orWhere('institute_address', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('mobile', 'LIKE', "%$keyword%")
                ->orWhere('date_of_birth', 'LIKE', "%$keyword%")
                ->orWhere('gender', 'LIKE', "%$keyword%")
                ->orWhere('marital_status', 'LIKE', "%$keyword%")
                ->orWhere('nationality', 'LIKE', "%$keyword%")
                ->orWhere('professional_statement', 'LIKE', "%$keyword%")
                ->orWhere('education_qualiication', 'LIKE', "%$keyword%")
                ->orWhere('experience_after_graduation', 'LIKE', "%$keyword%")
                ->orWhere('registration_number', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $doctors = Doctor::latest()->paginate($perPage);
        }

        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $doctorSpecializations =  DoctorSpecialization::all();
        return view('admin.doctors.create', compact('doctorSpecializations'));
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
            'first_name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:users,email',
            'mobile' => 'required|digits:10',
            'registration_number' => 'required',
            'professional_statement' => 'required',
        ]);
        $requestData = $request->all();

        // we create a associated user account with a random password
        $user =  User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'user_type' => User::USER_TYPE_DOCTOR
        ]);

        //@todo
        // need to send the random generated password to the doctor's email

        $requestData['user_id'] = $user->id;
        Doctor::create($requestData);

        return redirect('admin/doctors')->with('flash_message', 'Doctor added!');
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

        return view('admin.doctors.show', compact('doctor'));
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
        $doctor = Doctor::findOrFail($id);
        $doctorSpecializations =  DoctorSpecialization::all();
        return view('admin.doctors.edit', compact('doctor', 'doctorSpecializations'));
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
            'first_name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'mobile' => 'required|digits:10',
            'registration_number' => 'required',
            'professional_statement' => 'required',
        ]);
        $requestData = $request->all();

        $doctor = Doctor::findOrFail($id);
        $doctor->update($requestData);

        return redirect('admin/doctors')->with('flash_message', 'Doctor updated!');
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
        Doctor::destroy($id);

        return redirect('admin/doctors')->with('flash_message', 'Doctor deleted!');
    }
}
