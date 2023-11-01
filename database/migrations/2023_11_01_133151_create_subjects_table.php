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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subjects');
            
            $table->unsignedBigInteger('strands_id')->unsigned()->nullable();
            $table->foreign('strands_id')->references('id')->on('strands')->onDelete('cascade');
            $table->foreign('sections_id')->references('id')->on('strands')->onDelete('cascade');
            $table->enum('term', [11, 12]);
            $table->string('semester');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
