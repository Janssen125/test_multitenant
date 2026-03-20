<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Central Database Users (Super Admins)
        if (!tenant('id')) {
            User::firstOrCreate(
                ['email' => 'admin@gmail.com'],
                [
                    'name' => 'Master Super Admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('password'),
                    'role' => 'super_admin',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]
            );
        } else {
            // 2. Tenant Environment Users (Seeded distinctly in isolated schemas)
            
            // Re-seed the Super Admin into the tenant DB for universal access
            User::firstOrCreate(
                ['email' => 'admin@gmail.com'],
                [
                    'name' => 'Master Super Admin (Global)',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('password'),
                    'role' => 'super_admin',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]
            );

            // Seed Workspace Admin
            User::firstOrCreate(
                ['email' => 'admin@' . tenant('id') . '.com'],
                [
                    'name' => ucfirst(tenant('id')) . ' Admin',
                    'email' => 'admin@' . tenant('id') . '.com',
                    'password' => Hash::make('password'),
                    'role' => 'admin',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]
            );

            // Seed Regular Member
            User::firstOrCreate(
                ['email' => 'user@' . tenant('id') . '.com'],
                [
                    'name' => ucfirst(tenant('id')) . ' Staff Member',
                    'email' => 'user@' . tenant('id') . '.com',
                    'password' => Hash::make('password'),
                    'role' => 'user',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]
            );
        }
    }
}
