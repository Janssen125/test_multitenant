<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'TEST OK';
});

Route::get('/', function () {
    // Fetch all tenants to display them dynamically on the landing page!
    $tenants = \App\Models\Tenant::with('domains')->get();
    return view('welcome', compact('tenants'));
});

