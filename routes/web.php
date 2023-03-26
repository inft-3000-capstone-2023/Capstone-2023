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

//routes for client events index and creation page
Route::get('/client/{client}/events', [App\Http\Controllers\EventController::class,
    'client_events'])->name('client_events');
Route::get('/client/{client}/events/createS1', [App\Http\Controllers\EventController::class,
    'createS1'])->name('createS1');
Route::get('/client/{client}/events/createS2', [App\Http\Controllers\EventController::class,
    'createS2'])->name('createS2');
Route::get('/client/{client}/events/createS3', [App\Http\Controllers\EventController::class,
    'createS3'])->name('createS3');
Route::get('/client/{client}/events/createS4', [App\Http\Controllers\EventController::class,
    'createS4'])->name('createS4');
Route::post('/client/{client}/events/createS1', [App\Http\Controllers\EventController::class,
    'postcreateS1'])->name('postcreateS1');
Route::post('/client/{client}/events/createS2', [App\Http\Controllers\EventController::class,
    'postcreateS2'])->name('postcreateS2');
Route::post('/client/{client}/events/createS3', [App\Http\Controllers\EventController::class,
    'postcreateS3'])->name('postcreateS3');
Route::put('/client/{client}/events/createS4', [App\Http\Controllers\EventController::class,
    'postcreateS4'])->name('postcreateS4');




