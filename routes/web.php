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

Route::group(
    [
        'prefix'=>'/client/{client}',
        'as'=>'client.'
    ], function() {
        Route::get('/dashboard', [App\Http\Controllers\ClientController::class, 'display_dashboard'])->name('dashboard');

        // TODO Jay - Put in a customers route group within client route group
        Route::get('/customers', [App\Http\Controllers\ClientCustomerController::class, 'list_client_customers'])->name('customers');
        Route::delete('/customers/{customers}/delete', [App\Http\Controllers\ClientCustomerController::class, 'destroy'])->name('destroy_customer');

        Route::get('/customers/{customers}/details', [App\Http\Controllers\ClientCustomerController::class, 'customer_details'])
            ->name('customer_details');
        Route::get('/customers/{customers}/transactions', [App\Http\Controllers\ClientCustomerController::class, 'customer_transactions'])
            ->name('customer_transactions');
        Route::get('/customers/{customers}/transactions/{transaction}/details', [App\Http\Controllers\ClientCustomerController::class, 'transaction_details'])
            ->name('transaction_details');
        Route::get('/customers/{customers}/finances', [App\Http\Controllers\ClientCustomerController::class, 'customer_finances'])
            ->name('customer_finances');

        Route::get('/events/', [App\Http\Controllers\EventController::class, 'client_events'])->name('client_events');
        Route::get('/search_events', [App\Http\Controllers\EventController::class,'search_events'])->name('search_events');
        Route::get('/events/createS1', [App\Http\Controllers\EventController::class, 'createS1'])->name('createS1');
        Route::get('/events/createS2', [App\Http\Controllers\EventController::class, 'createS2'])->name('createS2');
        Route::get('/events/createS3', [App\Http\Controllers\EventController::class, 'createS3'])->name('createS3');
        Route::get('/events/createS4', [App\Http\Controllers\EventController::class, 'createS4'])->name('createS4');
        Route::post('/events/createS1', [App\Http\Controllers\EventController::class, 'postcreateS1'])->name('postcreateS1');
        Route::post('/events/createS2', [App\Http\Controllers\EventController::class, 'postcreateS2'])->name('postcreateS2');
        Route::post('/events/createS3', [App\Http\Controllers\EventController::class, 'postcreateS3'])->name('postcreateS3');
        Route::put('/events/createS4', [App\Http\Controllers\EventController::class, 'postcreateS4'])->name('postcreateS4');

        Route::get('/info/organizer',[\App\Http\Controllers\ClientController::class,'client_organizer'])->name('client_organizer');
        Route::get('/info/team', [\App\Http\Controllers\ClientUserController::class,'client_team'])->name('client_team');
        Route::get('/info/team/invite_team_member', [App\Http\Controllers\EventController::class, 'invite_team_member'])->name('invite_team_member');
        Route::get('/info/team/edit', [\App\Http\Controllers\ClientUserController::class,'team_edit'])->name('team_edit');
        Route::put('/info/team/edit', [\App\Http\Controllers\ClientUserController::class,'team_update'])->name('team_update');
        Route::get('/info/organizer/edit-profile',[\App\Http\Controllers\ClientController::class,'edit_profile'])->name('edit_profile');
        Route::put('/info/organizer/edit-profile',[\App\Http\Controllers\ClientController::class,'update_profile'])->name('update_profile');
    }
); // TODO Add Client Middleware Here (Jay)


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

//routes for the customer viewing the client pages =====================================================================
Route::get('/tickets/{client}', [App\Http\Controllers\ClientCustomerController::class, 'client_page'])->name('client_page');

//register --------------------------------
Route::get('/tickets/{client}/register', [App\Http\Controllers\Auth\Customer\RegisterController::class, 'showRegistrationForm'])->name('customer.register');
Route::post('/tickets/{client}/register', [App\Http\Controllers\Auth\Customer\RegisterController::class, 'register'])->name('customer.register.store');
//register --------------------------------

//login & logout --------------------------
Route::post('/tickets/{client}/logout', [App\Http\Controllers\Auth\Customer\LoginController::class, 'logout'])->name('customer.logout');
Route::get('/tickets/{client}/login', [App\Http\Controllers\Auth\Customer\LoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/tickets/{client}/login', [App\Http\Controllers\Auth\Customer\LoginController::class, 'login'])->name('customer.login.request');
//login & logout --------------------------

Route::get('/tickets/{client}/bio', [App\Http\Controllers\ClientCustomerController::class, 'bio_page'])->name('bio_page');
//reviews ----------------------------------
Route::get('/tickets/{client}/reviews', [App\Http\Controllers\ClientCustomerController::class, 'reviews_page'])->name('reviews_page');
Route::post('/tickets/{client}/reviews/post', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews_page.store');
Route::put('/tickets/{client}/reviews/{review}/update', [\App\Http\Controllers\ReviewController::class, 'update'])->name('reviews_page.update'); //update review
Route::delete('/tickets/{client}/reviews/{review}/delete', [\App\Http\Controllers\ReviewController::class, 'destroy'])->name('reviews_page.destroy'); //delete review
//reviews ----------------------------------
Route::get('/tickets/{client}/{event}', [App\Http\Controllers\ClientCustomerController::class, 'view_event_page'])->name('view_event_page');

//routes for the customer buying tickets to the client's event--------------------------------------------------
Route::get('/tickets/{client}/{event}/checkout/contact_info', [App\Http\Controllers\ClientCustomerController::class,
    'checkout_contact_info'])->name('checkout_contact_info');
Route::get('/tickets/{client}/{event}/checkout/overview', [App\Http\Controllers\ClientCustomerController::class,
    'checkout_order_overview'])->name('checkout_order_overview');
Route::get('/tickets/{client}/{event}/checkout/billing', [App\Http\Controllers\ClientCustomerController::class,
    'checkout_billing_info'])->name('checkout_billing_info');
Route::get('/tickets/{client}/{event}/checkout/success', [App\Http\Controllers\ClientCustomerController::class,
    'checkout_order_success'])->name('checkout_order_success');
