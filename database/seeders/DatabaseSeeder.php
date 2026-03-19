<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Dynamically orchestrate based on the connection context
        if (tenant('id')) {
            // Running inside the Isolated Tenant Environment
            $this->call([
                UserSeeder::class, // Seeds isolated tenant users
                MenuSeeder::class, // Seeds restaurant data
            ]);
        } else {
            // Running inside the Central Platform Environment
            $this->call([
                UserSeeder::class,   // Seeds the Central Super Admin
                TenantSeeder::class, // Sets up new Workspaces & Domains
            ]);
        }
    }
}
