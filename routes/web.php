<?php

use App\Http\Controllers\ {
    SiteController, PortalController, CallController };
use App\Http\Controllers\Admin\{
        UserController, RoleController, ResourceController, ModuleController };
use App\Http\Controllers\Subscription\SubscriptionController;
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



Route::group([ 'middleware' => ['auth','access.control.list']], function() {
    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class);
    Route::get('/roles/{role}/resources', [RoleController::class, 'syncResources'])->name('roles.resources');
	Route::put('/roles/{role}/resources', [RoleController::class, 'updateSyncResources'])->name('roles.resources.update');

    Route::resource('resources', ResourceController::class);

    Route::resource('modules', ModuleController::class);

    Route::resource('callers', CallController::class);
});