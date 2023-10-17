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
        Schema::create('stem11s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('grade_level'); // e.g., 'Grade 11', 'Grade 12'
            $table->string('semester'); // e.g., '1st Semester', '2nd Semester'
            $table->string('strand'); // e.g., 'STEM Strand'
            $table->string('subject_type'); // e.g., 'Core', 'Contextualized', 'Specialization'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stem11s');
    }
};
