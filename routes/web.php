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

Route::resource('admins', App\Http\Controllers\AdminController::class);

Route::resource('clients', App\Http\Controllers\ClientController::class);

Route::resource('customers', App\Http\Controllers\CustomerController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/overview','Client_Landing/client_home');

Route::view('/client_login','Client_Landing/client_login');

Route::view('/client_register','Client_Landing/client_register');

