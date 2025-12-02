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
        //
        Schema::create('enrollment', function (Blueprint $table){
            $table->bigIncrements('enrollment_id');
            $table->date('enrollment_date');
            $table->date('completion_date');
            $table->boolean('status');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('subject_id')->references('subject_id')->on('mapel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExist('enrollment');
    }
};
