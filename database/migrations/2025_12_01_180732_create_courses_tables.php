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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('courses_id');
            $table->string('title');
            $table->string('content');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('courses_mapel');
            $table->foreign('courses_mapel')->references('subject_id')->on('mapel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_tables');
    }
};
