<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/doctor-profile/{id}', 'DoctorController@show')->name('doctor-profile');
Route::get('/search-doctors', 'DoctorController@index')->name('search');

Route::prefix('patient')->name('patient.')->middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/inquiry/confirmed', 'Patient\InquiryController@confirmed')->name('inquiries.confirmed');
    Route::resource('inquiries', 'Patient\InquiryController');
    Route::get('/profile', 'Patient\ProfileController@create')->name('profile.create');
    Route::post('/profile', 'Patient\ProfileController@store')->name('profile.post');
});


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::resource('pharmacies', 'Admin\PharmaciesController');
    Route::resource('patients', 'Admin\PatientsController');
    Route::resource('doctors', 'Admin\DoctorsController');
    Route::resource('doctor-specializations', 'Admin\DoctorSpecializationsController');
    Route::resource('prescriptions', 'Admin\PrescriptionsController');
});

Route::prefix('doctor')->middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/', 'Doctor\DashboardController@index')->name('doctor.dashboard');
    Route::get('/inquiries', 'Doctor\InquiryController@index')->name('doctor.inquiries.index');
    Route::get('/inquiries/prescribed', 'Doctor\InquiryController@prescribed')->name('doctor.inquiries.prescribed');
    Route::get('/inquiry/{id}', 'Doctor\InquiryController@show')->name('doctor.inquiries.show');
    Route::patch('/inquiry/{id}', 'Doctor\InquiryController@update')->name('doctor.inquiries.show');
    Route::get('/inquiry/{id}/edit', 'Doctor\InquiryController@edit')->name('doctor.inquiries.edit');
    Route::get('/patients/{id}', 'Doctor\PatientsController@show')->name('doctor.patients.show');
});

Route::prefix('pharmacy')->middleware(['auth', 'role:pharmacist'])->group(function () {
    Route::get('/', 'Pharmacy\DashboardController@index')->name('pharmacy.dashboard');
});
