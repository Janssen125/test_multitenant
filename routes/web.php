<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'TEST OK';
});

// Explicitly register central routes only on designated central domains
$centralDomains = array_unique(array_merge(
    config('tenancy.central_domains', []),
    ['localhost', '127.0.0.1', 'test_multi_tenant.test', 'project-l7nc9.vercel.app']
));

foreach ($centralDomains as $domain) {
    if (!$domain) continue;

    Route::domain($domain)->middleware(['web'])->group(function () {
        
        // Platform Landing Page
        Route::get('/', function () {
            $tenants = \App\Models\Tenant::with('domains')->get();
            return view('welcome', compact('tenants'));
        })->name('central.landing');

        // Super Admin Hub routes
        Route::group(['prefix' => 'admin'], function() {
            
            // Master Admin Dashboard 
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('central.dashboard');

            // Workspace Management (Full CRUD)
            Route::group(['prefix' => 'tenants'], function() {
                Route::get('/', [TenantController::class, 'index'])->name('tenants.index');
                Route::get('/create', [TenantController::class, 'create'])->name('tenants.create');
                Route::post('/', [TenantController::class, 'store'])->name('tenants.store');
                Route::get('/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
                Route::put('/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
                Route::delete('/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
            });

            // Master User Management (Full CRUD)
            Route::group(['prefix' => 'users'], function() {
                Route::get('/', [AdminController::class, 'usersIndex'])->name('central.users.index');
                Route::get('/create', [AdminController::class, 'createUser'])->name('central.users.create');
                Route::post('/', [AdminController::class, 'storeUser'])->name('central.users.store');
                Route::get('/{user}/edit', [AdminController::class, 'editUser'])->name('central.users.edit');
                Route::put('/{user}', [AdminController::class, 'updateUser'])->name('central.users.update');
                Route::delete('/{user}', [AdminController::class, 'destroyUser'])->name('central.users.destroy');
            });
        });
    });
}
