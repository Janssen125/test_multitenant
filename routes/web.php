<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

/**
 * 🏢 Central Platform Hub
 * These routes are explicitly locked to only work on designated central domains.
 * This prevents central hub routes from appearing on tenant subdomains.
 */
$centralDomains = config('tenancy.central_domains', ['localhost', 'test_multi_tenant.test', '127.0.0.1']);

foreach ($centralDomains as $domain) {
    if (!$domain) continue;

    Route::domain($domain)->middleware(['web'])->group(function () {
        
        // 1. Central Platform Landing
        Route::get('/', function () {
            $tenants = \App\Models\Tenant::with('domains')->get();
            return view('welcome', compact('tenants'));
        })->name('central.landing');

        // 2. Platform Management Hub 🛡️
        Route::middleware(['auth', 'role:super_admin'])->prefix('platform')->group(function () {
            
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('central.dashboard');

            // Workspace management
            Route::prefix('workspaces')->group(function () {
                Route::get('/', [TenantController::class, 'index'])->name('tenants.index');
                Route::get('/create', [TenantController::class, 'create'])->name('tenants.create');
                Route::post('/', [TenantController::class, 'store'])->name('tenants.store');
                Route::get('/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
                Route::put('/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
                Route::delete('/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
            });

            // Platform operators
            Route::prefix('operators')->group(function () {
                Route::get('/', [AdminController::class, 'usersIndex'])->name('central.users.index');
                Route::get('/create', [AdminController::class, 'createUser'])->name('central.users.create');
                Route::post('/', [AdminController::class, 'storeUser'])->name('central.users.store');
                Route::get('/{user}/edit', [AdminController::class, 'editUser'])->name('central.users.edit');
                Route::put('/{user}', [AdminController::class, 'updateUser'])->name('central.users.update');
                Route::delete('/{user}', [AdminController::class, 'destroyUser'])->name('central.users.destroy');
            });
        });

        // Dedicated Auth routes for this domain
        require __DIR__.'/auth.php';
    });
}

// Global Landing Fallback (if any domain is not matched and not initialized)
Route::middleware(['web'])->group(function() {
    Route::get('/debug-host', function () {
        return [
            'host' => request()->getHost(),
            'tenant' => tenant('id'),
            'central_domains' => config('tenancy.central_domains', [])
        ];
    });
});
