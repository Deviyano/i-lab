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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // Titel van de evaluatie
            $table->text('description')->nullable(); // Beschrijving (optioneel)
            $table->unsignedTinyInteger('rating');   // Rating (1-5)
            $table->timestamps();            // Aangemaakt/Bijgewerkt timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};


