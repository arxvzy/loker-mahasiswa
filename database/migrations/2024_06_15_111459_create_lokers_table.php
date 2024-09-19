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
        Schema::create('lokers', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nama_perusahaan');
            $table->string('posisi');
            $table->text('deskripsi_perusahaan');
            $table->string('pendidikan');
            $table->string('gender');
            $table->string('status_kerja');
            $table->string('alamat');
            $table->string('panduan_daftar');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokers');
    }
};
