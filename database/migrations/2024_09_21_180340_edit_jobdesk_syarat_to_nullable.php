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
        Schema::table('syarats', function (Blueprint $table) {
            $table->string('syarat')->nullable()->change();
        });

        Schema::table('jobdesks', function (Blueprint $table) {
            $table->string('jobdesk')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('syarats', function (Blueprint $table) {
            $table->string('syarat')->nullable(false)->change();
        });

        Schema::table('jobdesks', function (Blueprint $table) {
            $table->string('jobdesk')->nullable(false)->change();
        });
    }
};
