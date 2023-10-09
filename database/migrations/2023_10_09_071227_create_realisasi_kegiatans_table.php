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
        Schema::create('realisasi_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('kegiatan_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('tanggal');
            $table->enum('triwulan', ['I', 'II', 'III', 'IV']);
            $table->string('target');
            $table->string('satuan');
            $table->double('pagu');
            $table->text('keterangan')->nullable();
            $table->text('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisasi_kegiatans');
    }
};
