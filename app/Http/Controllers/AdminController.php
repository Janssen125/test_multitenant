<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Master SuperAdmin Dashboard Overview.
     */
    public function dashboard()
    {
        $tenantCount = Tenant::count('*');
        $userCount = User::count('*');
        $tenants = Tenant::with('domains')->latest()->take(5)->get();
        return view('central.dashboard', compact('tenantCount', 'userCount', 'tenants'));
    }

    /**
     * System-wide Central User Management.
     */
    public function usersIndex()
    {
        $users = User::paginate(10, ['*'], 'page');
        return view('central.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new central user.
     */
    public function createUser()
    {
        return view('central.users.create');
    }

    /**
     * Store a new super-user or platform admin.
     */
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
            'password' => Hash::make($validated['password']),
            'role' => 'super_admin',
        ]);

        return redirect()->route('central.users.index')->with('success', 'Central administrator added.');
    }

    /**
     * Modify central user profile.
     */
    public function editUser(User $user)
    {
        return view('central.users.edit', compact('user'));
    }

    /**
     * Update central user credentials.
     */
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
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('central.users.index')->with('success', 'Admin profile updated.');
    }

    /**
     * Purge user from platform access.
     */
    public function destroyUser(User $user)
    {
        if (User::count('*') <= 1) {
            return redirect()->back()->with('error', 'Cannot remove the last platform administrator.');
        }

        $user->delete();
        return redirect()->route('central.users.index')->with('success', 'Admin account removed.');
    }
}
