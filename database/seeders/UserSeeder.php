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
        // 1. Central Database Users
        if (!tenant('id')) {
            User::firstOrCreate(
                ['email' => 'admin@gmail.com'],
                [
                    'name' => 'Super Admin',
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]
            );
        } else {
            // 2. Tenant Environment Users (Seeded distinctly in isolated schemas)
            User::firstOrCreate(
                ['email' => 'user@' . tenant('id') . '.com'],
                [
                    'name' => ucfirst(tenant('id')) . ' Member',
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]
            );
            
            User::firstOrCreate(
                ['email' => 'admin@' . tenant('id') . '.com'],
                [
                    'name' => ucfirst(tenant('id')) . ' Workspace Admin',
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]
            );
        }
    }
}
