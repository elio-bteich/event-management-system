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
Route::post('/reservation', 'ReservationsController@store')->middleware('auth')->name('reservation.store');
Route::get('/reservation/event/{event}', 'ReservationsController@create')->middleware('auth')->name('reservation.create');

Route::get('/reservation/sendEmailVerification/{email}', 'ReservationsController@send_email_verification');

Route::get('/events', 'EventsController@index')->name('event.index');
Route::get('/events/create', 'EventsController@create')->name('event.create');
Route::post('/events/create', 'EventsController@store')->name('event.store');
Route::get('/events/{event}', 'EventsController@show')->name('event.show');
Route::get('/events/{event}/edit', 'EventsController@edit')->name('event.edit');
Route::patch('/events/{event}', 'EventsController@update')->name('event.update');
Route::delete('/events/{event}', 'EventsController@destroy')->name('event.destroy');

//ajax
Route::get('/events/{event}/requests', 'EventsController@get_requests');
Route::get('/events/{event}/reservations', 'EventsController@get_reservations');

Route::post('/events/{event}/request/{reservation}/accept', 'ReservationsController@accept_reservation_request');
Route::post('/events/{event}/request/{reservation}/decline', 'ReservationsController@decline_reservation_request');


Auth::routes();
