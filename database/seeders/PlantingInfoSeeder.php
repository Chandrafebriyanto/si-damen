<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PlantingInfo;
use Carbon\Carbon;

class PlantingInfoSeeder extends Seeder
{
    public function run(): void
    {
        PlantingInfo::create([
            'date' => Carbon::create(2025, 1, 12)->toDateString(),
            'recommendations' => 'Padi, Jagung, Singkong',
            'temperature' => '28 °C'
        ]);
        PlantingInfo::create([
            'date' => Carbon::create(2025, 2, 15)->toDateString(),
            'recommendations' => 'Cabai, Tomat, Terong',
            'temperature' => '29 °C'
        ]);
        PlantingInfo::create([
            'date' => Carbon::create(2025, 1, 20)->toDateString(),
            'recommendations' => 'Bayam (awal tanam), Kangkung',
            'temperature' => '27 °C'
        ]);
         PlantingInfo::create([
            'date' => Carbon::create(2025, 3, 5)->toDateString(), // Maret
            'recommendations' => 'Mentimun, Pare',
            'temperature' => '28 °C'
        ]);
        PlantingInfo::create([
            'date' => Carbon::create(2026, 12, 10)->toDateString(), // Desember
            'recommendations' => 'Ubi Jalar',
            'temperature' => '26 °C'
        ]);
    }
}