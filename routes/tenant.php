<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::domain('{tenant}.test_multi_tenant.test')
    ->middleware([
        'web',
        \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
        \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
    ])
    ->group(function () {

        Route::get('/', function () {
            return 'TENANT: '.tenant('id');
        });

    });
