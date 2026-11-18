<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $existing = User::where('email', 'admin@bawanghitamsembalun.id')->first();
        if ($existing) {
            $existing->update([
                'name' => 'Administrator Bawang Hitam',
                'email' => 'admin@blackgarlicsembalun.com',
                'password' => Hash::make('SangatRahasia2026!'),
            ]);
        } else {
            User::updateOrCreate(
                ['email' => 'admin@blackgarlicsembalun.com'],
                [
                    'name' => 'Administrator Bawang Hitam',
                    'password' => Hash::make('SangatRahasia2026!'),
                ]
            );
        }
    }
}
