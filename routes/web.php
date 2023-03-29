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
//test comment
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

Route::view('/overview','Client_Landing/client_home');

//routes for the customer viewing the client pages-------------------------------------------------
Route::get('/tickets/{client}', [App\Http\Controllers\ClientCustomerController::class,
    'client_page'])->name('client_page');
Route::get('/tickets/{client}/bio', [App\Http\Controllers\ClientCustomerController::class,
    'bio_page'])->name('bio_page');
Route::get('/tickets/{client}/reviews', [App\Http\Controllers\ClientCustomerController::class,
    'reviews_page'])->name('reviews_page');
Route::get('/tickets/{client}/{event}', [App\Http\Controllers\ClientCustomerController::class,
    'view_event_page'])->name('view_event_page');

//routes for the customer buying tickets to the client's event--------------------------------------------------
Route::get('/tickets/{client}/checkout/contact_info', [App\Http\Controllers\ClientCustomerController::class,
    'checkout_contact_info'])->name('checkout_contact_info');
Route::get('/tickets/{client}/checkout/overview', [App\Http\Controllers\ClientCustomerController::class,
    'checkout_order_overview'])->name('checkout_order_overview');
Route::get('/tickets/{client}/checkout/billing', [App\Http\Controllers\ClientCustomerController::class,
    'checkout_billing_info'])->name('checkout_billing_info');
Route::get('/tickets/{client}/checkout/success', [App\Http\Controllers\ClientCustomerController::class,
    'checkout_order_success'])->name('checkout_order_success');
