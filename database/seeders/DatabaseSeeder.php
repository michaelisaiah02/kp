<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Rekon;
use App\Models\User;
use App\Models\Valin;
use App\Models\Witel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => 'Michael Isaiah',
            'email' => 'michael.isaiah.02@gmail.com',
            'password' => bcrypt('12345'),
            'warna' => '#00FF00'
        ]);
        User::factory(5)->create();

        Valin::factory(500)->has(User::factory())->create();

        Witel::create([
            'witel' => 'Bandung'
        ]);
        Witel::create([
            'witel' => 'Bandung Barat'
        ]);
        Witel::create([
            'witel' => 'Cirebon'
        ]);
        Witel::create([
            'witel' => 'Karawang'
        ]);
        Witel::create([
            'witel' => 'Sukabumi'
        ]);
        Witel::create([
            'witel' => 'Tasikmalaya'
        ]);

        Rekon::create([
            'bulan' => 'Januari'
        ]);
        Rekon::create([
            'bulan' => 'Februari'
        ]);
        Rekon::create([
            'bulan' => 'Maret'
        ]);
        Rekon::create([
            'bulan' => 'April'
        ]);
        Rekon::create([
            'bulan' => 'Mei'
        ]);
        Rekon::create([
            'bulan' => 'Juni'
        ]);
        Rekon::create([
            'bulan' => 'Juli'
        ]);
        Rekon::create([
            'bulan' => 'Agustus'
        ]);
        Rekon::create([
            'bulan' => 'September'
        ]);
        Rekon::create([
            'bulan' => 'Oktober'
        ]);
        Rekon::create([
            'bulan' => 'November'
        ]);
        Rekon::create([
            'bulan' => 'Desember'
        ]);
    }
}
