<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $tenants = Tenant::with('domains')->get();
        $users = User::all();
        return view('central.dashboard', compact('tenants', 'users'));
    }
}
