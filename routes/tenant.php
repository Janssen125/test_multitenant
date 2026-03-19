<?php

declare(strict_types=1);

use App\Http\Controllers\CmsController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Group all tenant routes under the necessary multi-tenant middleware
Route::middleware([
    'web',
    \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
    \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
])->group(function () {
    
    // Public Restaurant Front-end 
    Route::get('/', [PublicController::class, 'showMenu'])->name('tenant.public');

    // Tenant Administration CMS 
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [CmsController::class, 'dashboard'])->name('tenant.dashboard');

        // Orders Management
        Route::get('/orders', [CmsController::class, 'orders'])->name('tenant.orders');

        // Workspace Team Management
        Route::get('/team', [CmsController::class, 'team'])->name('tenant.team');

        // Menu & Dish Management
        Route::prefix('menu')->group(function() {
            Route::get('/create', [CmsController::class, 'createMenu'])->name('tenant.menu.create');
            Route::post('/', [CmsController::class, 'storeMenu'])->name('tenant.menu.store');
        });
    });
});
