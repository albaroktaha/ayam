<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'roles' => "Admin",
            ],
            [
                'username' => 'user',
                'password' => Hash::make('user'),
                'roles' => "User",
            ],
            [
                'username' => 'distributor',
                'password' => Hash::make('distributor'),
                'roles' => "Distributor",
            ],
        ]);
    }
}
