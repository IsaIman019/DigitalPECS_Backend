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
            [
                'id' => 1,
                'nama' => 'Makanan & Minuman',
                'icon' => 'modules/1.png',
            ],
            [
                'id' => 2,
                'nama' => 'Kegiatan Sehari-hari',
                'icon' => 'modules/2.png',
            ],
            [
                'id' => 3,
                'nama' => 'Pengenalan Benda',
                'icon' => 'modules/3.png',
            ],
            [
                'id' => 4,
                'nama' => 'Pengenalan Nama Orang',
                'icon' => 'modules/4.png',
            ],
        ];

        foreach ($modules as $module) {
            Module::updateOrCreate(
                ['id' => $module['id']],
                [
                    'nama' => $module['nama'],
                    'icon' => $module['icon'],
                ]
            );
        }
    }
}
