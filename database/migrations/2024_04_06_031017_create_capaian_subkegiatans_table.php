<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('capaian_subkegiatans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('indikator_subkegiatan_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('triwulan', ['I', 'II', 'III', 'IV']);
            $table->integer('capaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capaian_subkegiatans');
    }
};
