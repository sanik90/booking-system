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

Route::get('/', function () { return view('home'); })->name('home');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::get('/book/new', function () { return view('bookings/new'); })->name('new-booking');
Route::post('/book/new', ['uses' => 'BookingController@createBooking', 'as' => 'create-booking']);
Route::get('/booking/{id}', ['uses' => 'BookingController@getBooking', 'as' => 'booking']);
Route::post('/booking/{id}/approve', ['uses' => 'BookingController@approveBooking', 'as' => 'approve-booking']);
Route::post('/booking/{id}/reject', ['uses' => 'BookingController@rejectBooking', 'as' => 'reject-booking']);

Route::get('/login', function () { return view('admin/login'); })->name('login');
Route::post('/login', ['uses' => 'UserController@postLogin', 'as' => 'post-login']);
Route::get('/logout', function () { Auth::logout(); Session::flush(); return redirect('/'); } )->name('logout');

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/dashboard', ['uses' => 'UserController@getDashboard', 'as' => 'dashboard']);
    Route::get('/bookings', ['uses' => 'BookingController@getBookings', 'as' => 'bookings']);
});
