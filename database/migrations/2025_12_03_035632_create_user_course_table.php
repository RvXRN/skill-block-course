<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->foreign('course_id')->references('courses_id')->on('courses')->onDelete('cascade');

            $table->integer('progress')->default(0);
            $table->enum('status', ['ongoing', 'completed', 'dropped'])
                ->default('ongoing');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_courses');
    }
};
