<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('flag'); 
            $table->string('registration'); 
            $table->string('call_sign'); 
            $table->string('owner'); 
            $table->decimal('total_length', 8, 2); 
            $table->decimal('gross_tonnage', 8, 2); 
            $table->decimal('net_tonnage', 8, 2); 
            $table->decimal('beam', 8, 2); 
            $table->integer('passenger_capacity'); 
            $table->integer('crew_capacity'); 
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('boats');
    }
};
