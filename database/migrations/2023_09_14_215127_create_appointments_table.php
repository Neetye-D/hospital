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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id');
            $table->unsignedBigInteger('user_id'); 
            // $table->unsignedBigInteger('doctor_id');
            $table->string('full_name');
            $table->string('email');
            $table->date('date');
            $table->string('message',500)->nullable();
            $table->string('status');

            // $table->foreign('user_id')->references('id')->on('users'); // Change 'user_id' to 'id'
            // $table->foreign('doctor_id')->references('doctor_id')->on('doctors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
