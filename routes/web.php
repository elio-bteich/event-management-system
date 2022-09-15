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
Route::post('/reservation', 'ReservationsController@store')->middleware(['auth', 'verified'])->name('reservation.store');
Route::get('/reservation/event/{event}', 'ReservationsController@create')->middleware(['auth', 'verified'])->name('reservation.create');

Route::get('/events', 'EventsController@index')->name('event.index')->middleware('permission:read events');
Route::get('/events/create', 'EventsController@create')->name('event.create')->middleware('permission:create events');
Route::post('/events/create', 'EventsController@store')->name('event.store')->middleware('permission:create events');
Route::get('/events/{event}', 'EventsController@show')->name('event.show')->middleware('permission:read events');
Route::get('/events/{event}/edit', 'EventsController@edit')->name('event.edit')->middleware('permission:update events');
Route::patch('/events/{event}', 'EventsController@update')->name('event.update')->middleware('permission:update events');
Route::delete('/events/{event}', 'EventsController@destroy')->name('event.destroy')->middleware('permission:delete events');

Route::get('/events/{event}/requests', 'EventsController@get_requests');
Route::get('/events/{event}/reservations', 'EventsController@get_reservations');

Route::post('/request/{reservation}/accept', 'ReservationsController@accept_reservation_request');
Route::post('/request/{reservation}/decline', 'ReservationsController@decline_reservation_request');

Auth::routes(['verify' => true]);

Route::get('/admin', 'SuperAdminController@index')->name('admin.index')->middleware('role:super-admin');
Route::get('/admin/manage-users', 'SuperAdminController@manage_users_view')->name('admin.manage-users')->middleware('role:super-admin');
Route::patch('/admin/{user}', 'SuperAdminController@demote')->name('admin.demote')->middleware('role:super-admin');
Route::get('/admin/fetch_users/{user_fname}/{user_lname}/{user_email}', 'SuperAdminController@fetch_users')->middleware('role:super-admin');
Route::get('/admin/promote/{user}', 'SuperAdminController@promote_user')->middleware('role:super-admin');
Route::get('/admin/demote/{user}', 'SuperAdminController@demote_user')->middleware('role:super-admin');

Route::get('/phpinfo', fn() => phpinfo());