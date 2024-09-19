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
        Schema::create('jobdesks', function (Blueprint $table) {
            $table->ulid('id');
            $table->foreignUlid('loker_id')->constrained()->cascadeOnDelete();
            $table->string('jobdesk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobdesks');
    }
};
