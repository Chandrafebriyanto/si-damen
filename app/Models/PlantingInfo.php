<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantingInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', // Simpan sebagai YYYY-MM-DD
        'recommendations', // Teks: "Padi, Jagung, Singkong"
        'temperature',     // Teks: "28 °C"
    ];

    protected $casts = [
        'date' => 'date',
    ];
}