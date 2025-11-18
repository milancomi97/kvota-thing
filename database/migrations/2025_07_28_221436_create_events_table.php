<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->string('tip'); // wedding, baptism, birthday...
            $table->string('event_title')->nullable(); // naslov za goste
            $table->text('event_content')->nullable(); // opis želje
            $table->date('datum')->nullable();
            $table->string('status')->default('neaktivno'); // aktivno, završeno, arhivirano
            $table->unsignedBigInteger('moderator_id')->nullable();

            $table->string('display_mode')->default('grid'); // grid, slider
            $table->boolean('upload_enabled')->default(true);
            $table->boolean('moderation_enabled')->default(false);

            $table->timestamps();

            $table->foreign('moderator_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
