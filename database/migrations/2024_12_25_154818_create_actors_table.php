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
        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('cast_id');
            $table->unsignedBigInteger('film_id');
            $table->timestamps();

            // FKs
            $table->foreign('cast_id')->references('id')->on('casts');
            $table->foreign('film_id')->references('id')->on('films');

            // Constraints
            $table->unique(['cast_id','film_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
