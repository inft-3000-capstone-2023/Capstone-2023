<?php

use Illuminate\Support\Facades\Route;

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
});


Auth::routes();

Route::resource('admin', App\Http\Controllers\AdminController::class);

Route::resource('clients', App\Http\Controllers\ClientController::class);

// TODO Jay - This is to use the Event Controller with a named route, does it need to be a named route?
//  Could make this a non-resource route to simplify, since it only has show and delete func so far
Route::resource('clients/event', App\Http\Controllers\EventController::class);

Route::resource('customers', App\Http\Controllers\CustomerController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/overview','Client_Landing/client_home');

Route::view('/client_login','Client_Landing/client_login');

Route::view('/client_register','Client_Landing/client_register');
