<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'TEST OK';
});

// Route grouping directly for the central domain logic picking up from config
Route::middleware(['web'])->group(function () {
    
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
            Route::delete('/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
        });
    });
});
