<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the tenants.
     */
    public function index()
    {
        $tenants = Tenant::with('domains')->get();
        return view('central.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new tenant.
     */
    public function create()
    {
        return view('central.tenants.create');
    }

    /**
     * Store a newly created tenant in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|unique:tenants|alpha_dash',
            'domain' => 'required|string|unique:domains,domain',
        ]);

        $tenant = Tenant::create(['id' => $validated['id']]);
        $tenant->domains()->create(['domain' => $validated['domain']]);

        return redirect()->route('tenants.index')->with('success', 'Workspace created successfully! 🎉');
    }

    /**
     * Show the form for editing the specified tenant.
     */
    public function edit(Tenant $tenant)
    {
        $tenant->load('domains');
        return view('central.tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified tenant in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'domain' => 'required|string|unique:domains,domain,' . $tenant->domains->first()?->id,
        ]);

        if ($tenant->domains->first()) {
            $tenant->domains->first()->update(['domain' => $validated['domain']]);
        } else {
            $tenant->domains()->create(['domain' => $validated['domain']]);
        }

        return redirect()->route('tenants.index')->with('success', 'Workspace updated successfully.');
    }

    /**
     * Remove the specified tenant from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenants.index')->with('success', 'Workspace deleted successfully.');
    }
}
