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

Route::get('/admin',function(){
    return redirect(route('admin.clients.index'));
});
//======================================================================================================================

Route::group(
    [
        'prefix'=>'/admin',
        'as' =>'admin.'
    ], function () {
        Route::resource('clients', App\Http\Controllers\ClientController::class);
        Route::resource('users', App\Http\Controllers\AdminController::class);
    }
)->middleware(['auth','check.user.admin']);

Route::resource('clients', App\Http\Controllers\ClientController::class);

Route::resource('events', App\Http\Controllers\EventController::class);

Route::resource('customers', App\Http\Controllers\ClientCustomerController::class);

Route::view('/overview','Client_Landing/client_home');
