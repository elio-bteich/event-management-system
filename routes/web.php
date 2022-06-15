<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('homepage');
});

Route::get('/reservation', 'ReservationsController@index')->name('reservation.index');
Route::post('/reservation', 'ReservationsController@store')->name('reservation.store');
Route::get('/reservation/event/{event}', 'ReservationsController@create')->name('reservation.create');

Route::get('/reservation/sendEmailVerification/{email}', 'ReservationsController@send_email_verification');

Route::get('/events', 'EventsController@index')->name('event.index');
Route::get('/events/create', 'EventsController@create')->name('event.create');
Route::post('/events/create', 'EventsController@store')->name('event.store');
Route::get('/event/{event}', 'EventsController@show')->name('event.show');

//ajax
Route::get('/event/{event}/requests', 'EventsController@get_requests');
Route::get('/event/{event}/reservations', 'EventsController@get_reservations');

Route::post('/event/{event}/request/{reservation}', 'ReservationsController@update_acceptance_status');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
