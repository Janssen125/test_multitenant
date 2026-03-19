<?php

declare(strict_types=1);

use App\Http\Controllers\CmsController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Group all tenant routes under the necessary multi-tenant middleware
Route::group([
    'middleware' => [
        'web',
        \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
        \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
    ]
], function () {
    
    // Public Restaurant Front-end 
    Route::get('/', [PublicController::class, 'showMenu'])->name('tenant.public');

    // Tenant Administration CMS 
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [CmsController::class, 'dashboard'])->name('tenant.dashboard');

        // Orders Management
        Route::get('/orders', [CmsController::class, 'orders'])->name('tenant.orders');

        // Workspace Team Management (Full CRUD)
        Route::group(['prefix' => 'team'], function() {
            Route::get('/', [CmsController::class, 'team'])->name('tenant.team');
            Route::get('/create', [CmsController::class, 'createUser'])->name('tenant.team.create');
            Route::post('/', [CmsController::class, 'storeUser'])->name('tenant.team.store');
            Route::get('/{user}/edit', [CmsController::class, 'editUser'])->name('tenant.team.edit');
            Route::put('/{user}', [CmsController::class, 'updateUser'])->name('tenant.team.update');
            Route::delete('/{user}', [CmsController::class, 'destroyUser'])->name('tenant.team.destroy');
        });

        // Menu & Dish Management (Full CRUD)
        Route::group(['prefix' => 'menu'], function() {
            Route::get('/create', [CmsController::class, 'createMenu'])->name('tenant.menu.create');
            Route::post('/', [CmsController::class, 'storeMenu'])->name('tenant.menu.store');
            Route::get('/{menu}/edit', [CmsController::class, 'editMenu'])->name('tenant.menu.edit');
            Route::put('/{menu}', [CmsController::class, 'updateMenu'])->name('tenant.menu.update');
            Route::delete('/{menu}', [CmsController::class, 'destroyMenu'])->name('tenant.menu.destroy');
        });
    });
});
