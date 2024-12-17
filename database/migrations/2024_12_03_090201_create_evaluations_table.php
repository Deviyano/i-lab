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
            $table->string('vraag1');          
            $table->text('vraag2')->nullable(); 
            $table->unsignedTinyInteger('vraag3');   
            $table->timestamps();           
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};


