<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\UserCreated;
use App\Models\Pharmacy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PharmaciesController extends Controller
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
            $pharmacies = Pharmacy::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('registration_number', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('contact_number', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('pharmacy_name', 'LIKE', "%$keyword%")
                ->orWhere('pharmacy_address', 'LIKE', "%$keyword%")
                ->orWhere('pharmacy_city', 'LIKE', "%$keyword%")
                ->orWhere('pharmacy_phone', 'LIKE', "%$keyword%")
                ->orWhere('fax_number', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pharmacies = Pharmacy::latest()->paginate($perPage);
        }

        return view('admin.pharmacies.index', compact('pharmacies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pharmacies.create');
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
            'first_name' => 'required|max:20',
            'last_name' => 'max:20',
            'email' => 'required|email|max:60',
            'registration_number' => 'required|max:10',
            'email' => 'required|email|max:60|unique:users,email',
            'pharmacy_name' => 'required|string|max:40',
            'contact_number' => 'required|digits:10',
            'pharmacy_phone' => 'required|digits:10',
            'fax_number' => 'nullable|numeric|digits:10'
        ]);
        $requestData = $request->all();

        $password = Str::random(8);

        // we create a associated user account with a random password
        $user =  User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'user_type' => User::USER_TYPE_PHARMACIST
        ]);

        // send the random generated password to the pharmacist's email
        Mail::to($user)->send(new UserCreated($user, $password));

        $requestData['user_id'] = $user->id;

        Pharmacy::create($requestData);

        return redirect('admin/pharmacies')->with('flash_message', 'Pharmacy added!');
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
        $pharmacy = Pharmacy::findOrFail($id);

        return view('admin.pharmacies.show', compact('pharmacy'));
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
        $pharmacy = Pharmacy::findOrFail($id);

        return view('admin.pharmacies.edit', compact('pharmacy'));
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
            'first_name' => 'required|max:20',
            'last_name' => 'max:20',
            'email' => 'required|email|max:60',
            'registration_number' => 'required|max:10',
            'email' => 'required|email|max:60',
            'pharmacy_name' => 'required|string|max:40',
            'contact_number' => 'required|digits:10',
            'pharmacy_phone' => 'required|digits:10',
            'fax_number' => 'nullable|numeric|digits:10'
        ]);
        $requestData = $request->all();

        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->update($requestData);

        return redirect('admin/pharmacies')->with('flash_message', 'Pharmacy updated!');
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
        Pharmacy::destroy($id);

        return redirect('admin/pharmacies')->with('flash_message', 'Pharmacy deleted!');
    }
}
