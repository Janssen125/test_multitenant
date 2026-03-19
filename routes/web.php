<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'TEST OK';
});

// Central Routing (SaaS Platform Master Control)
$centralDomains = array_unique(array_merge(
    config('tenancy.central_domains', []),
    ['localhost', '127.0.0.1', 'test_multi_tenant.test', 'project-l7nc9.vercel.app']
));

foreach ($centralDomains as $domain) {
    if (!$domain) continue;

    Route::domain($domain)->group(function () {
        // Platform Landing Page
        Route::get('/', function () {
            $tenants = \App\Models\Tenant::with('domains')->get();
            return view('welcome', compact('tenants'));
        })->name('central.landing');

        // Master Super Admin Dashboard
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('central.dashboard');

        // Master Tenant Management
        Route::prefix('admin/tenants')->group(function() {
            Route::get('/', [TenantController::class, 'index'])->name('tenants.index');
            Route::get('/create', [TenantController::class, 'create'])->name('tenants.create');
            Route::post('/', [TenantController::class, 'store'])->name('tenants.store');
            Route::delete('/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
        });
    });
}
