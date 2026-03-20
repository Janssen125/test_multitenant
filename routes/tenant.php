<?php

declare(strict_types=1);

use App\Http\Controllers\CmsController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/**
 * 🍱 Tenant Workspace Routes
 * These routes are active on ANY domain that IS NOT a central platform domain.
 * We use a negative lookahead regex to prevent hijacking the central platform homepage.
 */
$centralDomains = config('tenancy.central_domains', ['localhost', 'test_multi_tenant.test', '127.0.0.1']);
$regex = '^(?!' . implode('|', array_map('preg_quote', $centralDomains)) . ').*';

Route::domain('{tenant_domain}')->where(['tenant_domain' => $regex])->middleware([
    'web',
    \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
    \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
])->group(function () {
    
    // 1. Restaurant Guest View
    Route::get('/', [PublicController::class, 'showMenu'])->name('tenant.public');

    // 2. Auth Routes 🗝️
    require __DIR__.'/auth.php';

    // 3. Workspace Administration Hub 🛡️
    Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin'], function () {
        
        Route::get('/dashboard', [CmsController::class, 'dashboard'])->name('tenant.dashboard');
        Route::get('/orders', [CmsController::class, 'orders'])->name('tenant.orders');

        // Workspace Team Management
        Route::group(['prefix' => 'team'], function() {
            Route::get('/', [CmsController::class, 'team'])->name('tenant.team');
            Route::get('/create', [CmsController::class, 'createUser'])->name('tenant.team.create');
            Route::post('/', [CmsController::class, 'storeUser'])->name('tenant.team.store');
            Route::get('/{user}/edit', [CmsController::class, 'editUser'])->name('tenant.team.edit');
            Route::put('/{user}', [CmsController::class, 'updateUser'])->name('tenant.team.update');
            Route::delete('/{user}', [CmsController::class, 'destroyUser'])->name('tenant.team.destroy');
        });

        // Menu Management
        Route::group(['prefix' => 'menu'], function() {
            Route::get('/', [CmsController::class, 'menuIndex'])->name('tenant.menu.index');
            Route::get('/create', [CmsController::class, 'createMenu'])->name('tenant.menu.create');
            Route::post('/', [CmsController::class, 'storeMenu'])->name('tenant.menu.store');
            Route::get('/{menu}/edit', [CmsController::class, 'editMenu'])->name('tenant.menu.edit');
            Route::put('/{menu}', [CmsController::class, 'updateMenu'])->name('tenant.menu.update');
            Route::delete('/{menu}', [CmsController::class, 'destroyMenu'])->name('tenant.menu.destroy');
        });
    });
});
