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
        Route::prefix('admin')->group(function () {
            
            // Master Admin Dashboard 
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('central.dashboard');

            // Master Tenant & Workspace Management
            Route::prefix('tenants')->group(function() {
                Route::get('/', [TenantController::class, 'index'])->name('tenants.index');
                Route::get('/create', [TenantController::class, 'create'])->name('tenants.create');
                Route::post('/', [TenantController::class, 'store'])->name('tenants.store');
                Route::get('/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
                Route::put('/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
                Route::delete('/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
            });
        });
    });
}
