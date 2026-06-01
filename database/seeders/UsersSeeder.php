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

        DB::table('users')->insert([
            'username' => "Test Orang Tua",
            'email' => "orangtua@digitalpecs.site",
            'password' => Hash::make('OrangTua123'),
            'role' => "Orang Tua",
            'nohp' => "08123456789",
            'alamat' => "Surabaya",
            'tgl_lahir' => '1970-05-12',
            'status' => "ACTIVE",
        ]);
        DB::table('users')->insert([
            'username' => "Test Guru",
            'email' => "guru@digitalpecs.site",
            'password' => Hash::make('Guru123'),
            'role' => "Guru",
            'nohp' => "08123456789",
            'alamat' => "Surabaya",
            'tgl_lahir' => '1986-05-12',
            'status' => "ACTIVE",
        ]);

        DB::table('users')->insert([
            'username' => "Test Anak 1",
            'email' => "anak1@digitalpecs.site",
            'password' => Hash::make('Anak1123'),
            'role' => "Anak",
            'orangtua_id' => 2,
            'nohp' => "08123456789",
            'alamat' => "Surabaya",
            'tgl_lahir' => '2006-05-12',
            'status' => "ACTIVE",
        ]);
        DB::table('users')->insert([
            'username' => "Test Anak 2",
            'email' => "anak2@digitalpecs.site",
            'password' => Hash::make('Anak2123'),
            'role' => "Anak",
            'orangtua_id' => 2,
            'nohp' => "08123456789",
            'alamat' => "Surabaya",
            'tgl_lahir' => '2012-05-12',
            'status' => "ACTIVE",
        ]);
    }
}
