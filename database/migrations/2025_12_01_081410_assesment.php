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
        Schema::create('assesment', function (Blueprint $table){
            $table->bigIncrements('assesment_id');
            $table->string('title', 32);
            $table->string('type', 12);
            $table->integer('max_score');
            $table->char('time_limit', 2);
            $table->integer('attempts_allowed');
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('assesment');
    }
};
