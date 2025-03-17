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
            $table->text('vraag1')->nullable(); // Maak het veld nullable als het niet verplicht moet zijn
            $table->text('vraag2')->nullable();
            $table->text('vraag3')->nullable();
            $table->timestamps();          
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};


