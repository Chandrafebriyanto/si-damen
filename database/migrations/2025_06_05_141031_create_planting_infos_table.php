<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('planting_infos', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique(); // Setiap tanggal memiliki satu catatan
            $table->text('recommendations');
            $table->string('temperature');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('planting_infos');
    }
};