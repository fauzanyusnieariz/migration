<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@mail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('admin'), // Bisa diganti dengan md5/sha1 tapi disarankan bcrypt
                'role' => 'admin',
            ]
        );
    }
}


