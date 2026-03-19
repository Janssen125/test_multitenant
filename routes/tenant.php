<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

// Dynamically register tenant routes for all potential central domains
$centralDomains = array_unique(array_merge(
    config('tenancy.central_domains', []),
    ['localhost', '127.0.0.1', 'test_multi_tenant.test']
));

foreach ($centralDomains as $domain) {
    Route::domain('{tenant}.' . $domain)
        ->middleware([
            'web',
            \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
            \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
        ])
        ->group(function () {
            Route::get('/', function () {
                return 'TENANT: ' . tenant('id');
            });
        });
}
