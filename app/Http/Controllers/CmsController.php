<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function dashboard()
    {
        $menus = Menu::all();
        $users = User::all();
        return view('tenant.dashboard', compact('menus', 'users'));
    }

    public function createMenu()
    {
        return view('tenant.menus.create');
    }

    public function storeMenu(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url',
        ]);

        Menu::create($validated);

        return redirect()->route('tenant.dashboard')->with('status', 'New dish added and served! 🍽️');
    }

    public function orders()
    {
        return view('tenant.orders.index');
    }

    public function team()
    {
        $users = User::all();
        return view('tenant.team.index', compact('users'));
    }
}
