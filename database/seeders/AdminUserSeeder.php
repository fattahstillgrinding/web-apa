<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sekolah.com'],
            [
                'name'     => 'Administrator',
                'email'    => 'admin@sekolah.com',
                'password' => Hash::make('admin123'),
            ]
        );

        $this->command->info('Admin user created: admin@sekolah.com / admin123');
    }
}
