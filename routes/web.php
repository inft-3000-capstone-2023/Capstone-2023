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
//======================================================================================================================

Route::resource('admins', App\Http\Controllers\AdminController::class);

Route::resource('clients', App\Http\Controllers\ClientController::class);

Route::resource('customers', App\Http\Controllers\ClientCustomerController::class);

Route::resource('admin', App\Http\Controllers\ClientController::class)->middleware(['auth', 'check.user.admin']);
// TODO Will need to add middleware here to prevent unauthorized access

Route::resource('events',\App\Http\Controllers\EventController::class);

Route::get('events', 'EventController@index')->name('events.index');

Route::get('events/createS1', 'EventController@createS1')->name('events.createS1');
Route::post('events/createS1', 'EventController@postCreateS1')->name('events.createS1.post');

Route::get('events/createS2', 'EventController@createS2')->name('events.createS2');
Route::post('events/createS2', 'EventController@postCreateS2')->name('events.createS2.post');

Route::get('events/createS3', 'EventController@createS3')->name('events.createS3');
Route::post('events/createS3', 'EventController@postcreateS3')->name('events.createS3.post');

Route::get('events/createS4', 'EventController@createS4')->name('events.createS4');
Route::post('events/createS4', 'EventController@postcreateS4')->name('events.createS4.post');




