<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'TEST OK';
});

// Ensure the central domains strictly match root domains
$centralDomains = array_unique(array_merge(
    config('tenancy.central_domains', []),
    ['localhost', '127.0.0.1', 'test_multi_tenant.test', 'project-l7nc9.vercel.app']
));

foreach ($centralDomains as $domain) {
    if (!$domain) continue;
    Route::domain($domain)->group(function () {
        Route::get('/', function () {
            $tenants = \App\Models\Tenant::with('domains')->get();
            return view('welcome', compact('tenants'));
        });

        Route::get('/admin/dashboard', function () {
            $tenants = \App\Models\Tenant::with('domains')->get();
            $users = \App\Models\User::all();
            return view('central.dashboard', compact('tenants', 'users'));
        });
    });
}

