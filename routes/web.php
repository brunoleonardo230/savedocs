<?php

use App\Http\Controllers\ {
    SiteController, PortalController, TicketController, CommentController };
use App\Http\Controllers\Admin\{
    UserController, RoleController, ResourceController, ModuleController, PlanController, 
    FeatureController, CategoryController, ServiceController, StatusController, AccountController
};
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

require __DIR__.'/auth.php';

Route::get('laravel-version', function() {
    $laravel = app();
    return "Your Laravel version is ".$laravel::VERSION;
});

Route::group([ 'middleware' => ['auth','access.control.list']], function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);

    Route::resource('accounts', AccountController::class);
    Route::get('/accounts/show', [AccountController::class, 'show'])->name('accounts.show');
    Route::put('/accounts/{id}/update-access', [AccountController::class, 'updateAccess'])->name('accounts.access.update');
    
    Route::resource('roles', RoleController::class);
    Route::get('/roles/{role}/resources', [RoleController::class, 'syncResources'])->name('roles.resources');
	Route::put('/roles/{role}/resources', [RoleController::class, 'updateSyncResources'])->name('roles.resources.update');

    Route::resource('resources', ResourceController::class);

    Route::resource('modules', ModuleController::class);

    Route::resource('tickets', TicketController::class);

    Route::resource('plans', PlanController::class);
    Route::get('/plans/{plan}/features', [PlanController::class, 'syncFeatures'])->name('plans.features');
	Route::put('/plans/{plan}/features', [PlanController::class, 'updateSyncFeatures'])->name('plans.features.update');
    Route::get('/plans/{plan}/services', [PlanController::class, 'syncServices'])->name('plans.services');
	Route::put('/plans/{plan}/services', [PlanController::class, 'updateSyncServices'])->name('plans.services.update');
    
    Route::resource('features', FeatureController::class);

    Route::resource('services', ServiceController::class);

    Route::resource('statuses', StatusController::class);

    Route::resource('comments', CommentController::class);
});