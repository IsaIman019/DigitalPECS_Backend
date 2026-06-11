<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            'Makanan & Minuman',
            'Kegiatan Sehari-hari',
            'Pengenalan Benda',
            'Pengenalan Nama Orang',
        ];

        foreach ($modules as $module) {
            Module::firstOrCreate([
                'nama' => $module
            ]);
        }
    }
}
