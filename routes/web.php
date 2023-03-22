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
    return redirect(route('list_clients'));
})->name('admin');
//======================================================================================================================

Route::resource('admin/clients',App\Http\Controllers\ClientController::class)
        ->name('index','list_clients')
        ->name('create','create_client')
        ->name('store','store_client')
        ->name('show','show_client')
        ->name('edit','edit_client')
        ->name('update','update_client')
        ->name('destroy','destroy_client')
    ->middleware(['auth','check.user.admin']);

Route::resource('admin/users',App\Http\Controllers\AdminController::class)
        ->name('index','list_users')
        ->name('create','create_user')
        ->name('store','store_user')
        ->name('show','show_user')
        ->name('edit','edit_user')
        ->name('update','update_user')
        ->name('destroy','destroy_user')
    ->middleware(['auth','check.user.admin']);

//Route::resource('admins', App\Http\Controllers\AdminController::class);

Route::resource('clients', App\Http\Controllers\ClientController::class);

Route::resource('events', App\Http\Controllers\EventController::class);

Route::resource('customers', App\Http\Controllers\ClientCustomerController::class);

Route::view('/overview','Client_Landing/client_home');
