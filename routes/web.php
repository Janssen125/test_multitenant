<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'TEST OK';
});

// Automatically use the central domains configured in tenancy.php, plus manual fallbacks
$centralDomains = array_unique(array_merge(
    config('tenancy.central_domains', []),
    ['localhost', '127.0.0.1', 'test_multi_tenant.test']
));

foreach ($centralDomains as $domain) {
    Route::domain($domain)->group(function () {
        Route::get('/', function () {
            // Fetch all tenants to display them dynamically on the landing page!
            $tenants = \App\Models\Tenant::with('domains')->get();
            return view('welcome', compact('tenants'));
        });
    });
}

