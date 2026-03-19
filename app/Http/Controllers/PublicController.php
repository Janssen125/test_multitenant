<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display the public restaurant menu view for customers.
     */
    public function showMenu()
    {
        $menus = Menu::where('is_active', true)->get();
        return view('tenant.public', compact('menus'));
    }
}
