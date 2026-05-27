<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => "SuperAdmin",
            'email' => "superadmin@digitalpecs.site",
            'password' => Hash::make('SuperAdmin123'),
            'role' => "SuperAdmin",
            'nohp' => "08123456789",
            'alamat' => "Surabaya",
            'tgl_lahir' => '2000-05-12',
            'status' => "ACTIVE",
        ]);
    }
}
