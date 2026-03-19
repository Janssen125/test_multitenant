<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'TEST OK';
});

// Central Routing (SaaS Platform Master Control)
Route::middleware(['web'])->group(function () {
    
    // Platform Landing Page
    Route::get('/', function () {
        $tenants = \App\Models\Tenant::with('domains')->get();
        return view('welcome', compact('tenants'));
    })->name('central.landing');

    // Super Admin Side
    Route::group(['prefix' => 'admin'], function() {
        
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('central.dashboard');

        // Full Workspace / Tenant Management 
        Route::group(['prefix' => 'tenants'], function() {
            Route::get('/', [TenantController::class, 'index'])->name('tenants.index');
            Route::get('/create', [TenantController::class, 'create'])->name('tenants.create');
            Route::post('/', [TenantController::class, 'store'])->name('tenants.store');
            Route::get('/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
            Route::put('/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
            Route::delete('/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
        });
    });
});
