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
        Schema::create('checker_fods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('well_id')->constrained('wells')->onDelete('cascade');
            $table->foreignId('name_id')->constrained('names')->onDelete('cascade');
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade');
            $table->date('date');
            $table->boolean('adjust_stuffing_box');
            $table->boolean('top_soil');
            $table->boolean('csrb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checker_fods');
    }
};
