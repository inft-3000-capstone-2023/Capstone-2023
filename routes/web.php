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

        Route::resource('customers', App\Http\Controllers\ClientCustomerController::class);

        Route::get('/events/', [App\Http\Controllers\EventController::class, 'client_events'])->name('client_events');
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
        Route::get('/info/team/edit', [\App\Http\Controllers\ClientUserController::class,'team_edit'])->name('team_edit');
        Route::put('/info/team/edit', [\App\Http\Controllers\ClientUserController::class,'team_update'])->name('team_update');
        Route::get('/info/organizer/edit-profile',[\App\Http\Controllers\ClientController::class,'edit_profile'])->name('edit_profile');
        Route::put('/info/organizer/edit-profile',[\App\Http\Controllers\ClientController::class,'update_profile'])->name('update_profile');
    }
); // TODO Add Client Middleware Here (Jay)


Route::resource('events', App\Http\Controllers\EventController::class);

Route::resource('customers', App\Http\Controllers\ClientCustomerController::class);

//routes for the customer viewing the client pages
Route::get('/tickets/{client}', [App\Http\Controllers\ClientCustomerController::class,
    'client_page'])->name('client_page');
Route::get('/tickets/{client}/bio', [App\Http\Controllers\ClientCustomerController::class,
    'bio_page'])->name('bio_page');
Route::get('/tickets/{client}/reviews', [App\Http\Controllers\ClientCustomerController::class,
    'reviews_page'])->name('reviews_page');
Route::get('/tickets/{client}/{event}', [App\Http\Controllers\ClientCustomerController::class,
    'view_event_page'])->name('view_event_page');
