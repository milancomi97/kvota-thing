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
        Schema::table('events', function (Blueprint $table) {
            $table->string('event_code', 8)
                ->unique()
                ->after('upload_token')
                ->comment('Jedinstvena šifra za pristup galeriji')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Prvo uklonimo unique indeks, pa kolonu
            $table->dropUnique(['event_code']);
            $table->dropColumn('event_code');
        });

    }
};
