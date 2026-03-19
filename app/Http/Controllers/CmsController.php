<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    /**
     * Tenant Resource Overview (Dashboard Stats)
     */
    public function dashboard()
    {
        $stats = [
            'total_dishes' => Menu::count('*'),
            'pending_orders' => 0,
            'team_count' => User::count('*'),
        ];
        return view('tenant.dashboard', compact('stats'));
    }

    /**
     * Dedicated Menu Management View
     */
    public function menuIndex()
    {
        $menus = Menu::all();
        return view('tenant.menus.index', compact('menus'));
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

        return redirect()->route('tenant.menu.index')->with('status', 'New dish added and served! 🍽️');
    }

    public function editMenu(Menu $menu)
    {
        return view('tenant.menus.edit', compact('menu'));
    }

    public function updateMenu(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url',
        ]);

        $menu->update($validated);

        return redirect()->route('tenant.menu.index')->with('status', 'Dish updated successfully!');
    }

    public function destroyMenu(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('tenant.menu.index')->with('status', 'Dish removed from menu.');
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

    public function createUser()
    {
        return view('tenant.team.create');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
        ]);

        return redirect()->route('tenant.team')->with('status', 'Team member invited successfully!');
    }

    public function editUser(User $user)
    {
        return view('tenant.team.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('tenant.team')->with('status', 'Team member details updated.');
    }

    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot remove yourself from the workspace.');
        }

        $user->delete();
        return redirect()->route('tenant.team')->with('status', 'Team member removed from workspace.');
    }
}
