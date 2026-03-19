<?php

declare(strict_types=1);

use App\Http\Controllers\CmsController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Dynamically register tenant routes for all potential central domains
$centralDomains = array_unique(array_merge(
    config('tenancy.central_domains', []),
    ['localhost', '127.0.0.1', 'test_multi_tenant.test', 'project-l7nc9.vercel.app']
));

foreach ($centralDomains as $domain) {
    if (!$domain) continue;

    Route::domain('{tenant}.' . $domain)
        ->middleware([
            'web',
            \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
            \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
        ])
        ->group(function () {
            // Public Application View (The Restaurant Menu for Customers)
            Route::get('/', [PublicController::class, 'showMenu'])->name('tenant.public');

            // Tenant CMS Admin Dashboard (For the Restaurant Owner to Manage Menus)
            Route::prefix('admin')->group(function () {
                Route::get('/dashboard', [CmsController::class, 'dashboard'])->name('tenant.dashboard');

                // Menu Management Routes
                Route::get('/menu/create', [CmsController::class, 'createMenu'])->name('tenant.menu.create');
                Route::post('/menu', [CmsController::class, 'storeMenu'])->name('tenant.menu.store');
            });
        });
}
