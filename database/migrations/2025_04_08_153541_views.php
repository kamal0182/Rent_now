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
        schema::create('views',function (Blueprint $table){
                $table->id();
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');       // The user giving the ranking
                $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade'); // The profile being ranked

                $table->integer('ranking'); // e.g., a value from 1 to 5 or 1 to 10

                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('views');
    }
};
