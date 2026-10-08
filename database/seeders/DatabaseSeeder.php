<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create the initial admin account used to moderate testimonials
        // and review contact messages. Override via ADMIN_EMAIL / ADMIN_PASSWORD.
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@ignitetalentgroup.co.uk')],
            [
                'name' => env('ADMIN_NAME', 'Ignite Admin'),
                'password' => Hash::make(env('ADMIN_PASSWORD', 'change-me-now')),
                'is_admin' => true,
                'email_verified_at' => now(),
            ],
        );
    }
}
