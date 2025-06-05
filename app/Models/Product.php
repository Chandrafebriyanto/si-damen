<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location_city',
        'description',
        'image_path',
        'whatsapp_link', // Ditambahkan untuk link dinamis
        'instagram_link', // Ditambahkan untuk link dinamis
    ];
}