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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('students_id')->constrained()->cascadeOnDelete();
            $table->foreignId('strands_id')->constrained()->cascadeOnDelete();
            $table->enum('term', ['11', '12']);
            $table->foreignId('sections_id')->constrained()->cascadeOnDelete();
            $table->enum('semester', ['1st semester', '2nd semester']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};