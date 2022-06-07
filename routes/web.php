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
    return view('index');
});

Route::get('/reservation', 'ReservationsController@create')->name('reservation.create');
Route::post('/reservation', 'ReservationsController@store')->name('reservation.store');

Route::get('/events', 'EventsController@index')->name('event.index');
Route::get('/events/create', 'EventsController@create')->name('event.create');
Route::post('/events/create', 'EventsController@store')->name('event.store');
Route::get('/event/{event}', 'EventsController@show')->name('event.show');
