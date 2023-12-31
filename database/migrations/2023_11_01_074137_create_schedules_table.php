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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teachers_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subjects_id')->constrained()->cascadeOnDelete();
            $table->foreignId('strands_id')->constrained()->cascadeOnDelete();
            $table->enum('Day',['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']);
            $table->foreignId('sections_id')->constrained()->cascadeOnDelete();
            $table->time('time');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};


