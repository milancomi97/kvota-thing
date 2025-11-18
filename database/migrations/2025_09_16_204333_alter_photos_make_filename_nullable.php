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
        Schema::table('photos', function (Blueprint $table) {
            $table->string('filename')->nullable()->change(); // ← ključna linija
        });
    }

    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->string('filename')->nullable(false)->change();
        });
    }
};
//php artisan migrate --path=database/migrations/2025_09_16_204333_alter_photos_make_filename_nullable.php
