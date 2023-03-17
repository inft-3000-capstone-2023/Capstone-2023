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
    return redirect(route('home'));
});


Auth::routes();

//landing page routes ==================================================================================================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('home/register', [App\Http\Controllers\HomeController::class, 'register'])->name('client_register');

Route::get('home/login', [App\Http\Controllers\HomeController::class, 'login'])->name('client_login');

Route::view('/client_login','main_landing/pages/client_login');

Route::view('/client_register','main_landing/pages/client_register');
//======================================================================================================================

Route::resource('admins', App\Http\Controllers\AdminController::class);

Route::resource('clients', App\Http\Controllers\ClientController::class);

Route::resource('customers', App\Http\Controllers\ClientCustomerController::class);

Route::resource('admin', App\Http\Controllers\ClientController::class);
// TODO Will need to add middleware here to prevent unauthorized access

Route::view('/overview','Client_Landing/client_home');
