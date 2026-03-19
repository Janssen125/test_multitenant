<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create central admin user
        User::firstOrCreate(
            ['email' => 'admin@landing.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Sample Tenants Demo
        $this->createTenantIfNotExists('acme', ['acme.localhost', 'acme.test_multi_tenant.test']);
        $this->createTenantIfNotExists('omega', ['omega.localhost', 'omega.test_multi_tenant.test']);
    }

    private function createTenantIfNotExists(string $id, array $domains): void
    {
        if (!Tenant::where('id', $id)->first()) {
            $tenant = Tenant::create(['id' => $id]);
            foreach ($domains as $domain) {
                // Ignore domains if they already exist
                if (!$tenant->domains()->where('domain', $domain)->exists()) {
                    $tenant->domains()->create(['domain' => $domain]);
                }
            }
        }
    }
}
