<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\Subscription\SubscriptionController;
use App\Http\Controllers\Admin\{
    UserController, RoleController, ResourceController };
use Illuminate\Support\Facades\Route;

Route::get('/', [PortalController::class, 'index'])->name('portal.index');
Route::get('/parasuacasa', [PortalController::class, 'parasuacasa'])->name('parasuacasa');
Route::get('/about', [PortalController::class, 'about'])->name('about');

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');


Route::get('subscriptions/resume', [SubscriptionController::class, 'resume'])->name('subscriptions.resume');
Route::get('subscriptions/cancel', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
Route::get('subscriptions/invoice/{invoice}', [SubscriptionController::class, 'downloadInvoice'])->name('subscriptions.invoice.download');
Route::get('subscriptions/account', [SubscriptionController::class, 'account'])->name('subscriptions.account');
Route::post('subscriptions/store', [SubscriptionController::class, 'store'])->name('subscriptions.store')->middleware(['check.choice.plan']);
Route::get('subscriptions/checkout', [SubscriptionController::class, 'index'])->name('subscriptions.checkout')->middleware(['check.choice.plan']);
Route::get('subscriptions/premium', [SubscriptionController::class, 'premium'])->name('subscriptions.premium')->middleware(['subscribed']);

Route::get('/assinar/{url}', [SiteController::class, 'createSessionPlan'])->name('choice.plan');
//Route::get('/', [SiteController::class, 'index'])->name('site.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('laravel-version', function() {
    $laravel = app();
    return "Your Laravel version is ".$laravel::VERSION;
});



Route::group([ 'middleware' => 'access.control.list'], function() {

    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/show/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
	Route::get('/roles/{role}/resources', [RoleController::class, 'syncResources'])->name('roles.resources');
	Route::put('/roles/{role}/resources', [RoleController::class, 'updateSyncResources'])->name('roles.resources.update');

    Route::get('/resources/index', [ResourceController::class, 'index'])->name('resources.index');
    Route::get('/resources/create', [ResourceController::class, 'create'])->name('resources.create');
    Route::post('/resources/store', [ResourceController::class, 'store'])->name('resources.store');
    Route::get('/resources/show/{id}', [ResourceController::class, 'show'])->name('resources.show');
    Route::get('/resources/edit/{id}', [ResourceController::class, 'edit'])->name('resources.edit');
    Route::put('/resources/update/{id}', [ResourceController::class, 'update'])->name('resources.update');
    Route::delete('/resources/destroy/{id}', [ResourceController::class, 'destroy'])->name('resources.destroy');   
    
});