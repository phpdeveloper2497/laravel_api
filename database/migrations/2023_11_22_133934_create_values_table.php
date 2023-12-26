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
        Schema::create('values', function (Blueprint $table) {
            $table->id();
            $table->morphs('valuable');
            $table->string('name');
            $table->unsignedBigInteger('addition_cost')->nullable(); //material yoki biror xususiyati uchun qo'shiladigan sum
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('values');
    }
};
