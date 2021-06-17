<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DoctorSpecialization;
use Illuminate\Http\Request;

class DoctorSpecializationsController extends Controller
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
            $doctorspecializations = DoctorSpecialization::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $doctorspecializations = DoctorSpecialization::latest()->paginate($perPage);
        }

        return view('admin.doctor-specializations.index', compact('doctorspecializations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.doctor-specializations.create');
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
			'name' => 'required|max:50',
			'description' => 'required|max:500'
		]);
        $requestData = $request->all();
        
        DoctorSpecialization::create($requestData);

        return redirect('admin/doctor-specializations')->with('flash_message', 'DoctorSpecialization added!');
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
        $doctorspecialization = DoctorSpecialization::findOrFail($id);

        return view('admin.doctor-specializations.show', compact('doctorspecialization'));
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
        $doctorspecialization = DoctorSpecialization::findOrFail($id);

        return view('admin.doctor-specializations.edit', compact('doctorspecialization'));
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
			'name' => 'required|max:50',
			'description' => 'required|max:500'
		]);
        $requestData = $request->all();
        
        $doctorspecialization = DoctorSpecialization::findOrFail($id);
        $doctorspecialization->update($requestData);

        return redirect('admin/doctor-specializations')->with('flash_message', 'DoctorSpecialization updated!');
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
        DoctorSpecialization::destroy($id);

        return redirect('admin/doctor-specializations')->with('flash_message', 'DoctorSpecialization deleted!');
    }
}
