<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Prevent running this seeder inside an active tenant connection
        if (tenant('id')) {
            return;
        }

        $this->createTenantIfNotExists('acme', ['acme.localhost', 'acme.test_multi_tenant.test', 'acme-project-l7nc9.vercel.app']);
        $this->createTenantIfNotExists('omega', ['omega.localhost', 'omega.test_multi_tenant.test', 'omega-project-l7nc9.vercel.app']);
    }

    private function createTenantIfNotExists(string $id, array $domains): void
    {
        $tenant = Tenant::where('id', '=', $id)->first();
        
        if (!$tenant) {
            $tenant = Tenant::create(['id' => $id]);
        }

        foreach ($domains as $domain) {
            if (!$tenant->domains()->where('domain', $domain)->exists()) {
                $tenant->domains()->create(['domain' => $domain]);
            }
        }
    }
}
