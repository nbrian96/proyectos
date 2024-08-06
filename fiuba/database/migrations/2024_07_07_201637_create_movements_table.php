<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('ship_travel_id')->nullable();
            $table->string('person_id');
            $table->string('rank_id')->nullable();
            $table->dateTime('arrival_datetime')->nullable();
            $table->string('procedure_id')->nullable();
            $table->string('intl_flight')->nullable();
            $table->string('tranfer_id')->nullable();
            $table->string('supplier_id')->nullable();
            $table->string('hotel_id')->nullable();
            $table->string('early_late_id')->nullable();
            $table->string('room_id')->nullable();
            $table->integer('nights')->nullable();
            $table->string('reservation_number')->nullable();
            $table->string('airport_id')->nullable();
            $table->dateTime('flight_datetime')->nullable();
            $table->string('local_flight')->nullable();
            $table->dateTime('etd')->nullable();
            $table->dateTime('eta_ush_datetime')->nullable();
            $table->string('hotel_ush_id')->nullable();
            $table->string('room_ush_id')->nullable();
            $table->string('early_late_ush_id')->nullable();
            $table->string('reservation_number_ush')->nullable();
            $table->integer('nights_ush')->nullable();
            $table->string('tranfer_ush_id')->nullable();
            $table->dateTime('pick_up_hotel_datetime')->nullable();
            $table->string('supplier_ush_id')->nullable();
            $table->dateTime('embark_datetime')->nullable();
            $table->string('redirection_id')->nullable();
            $table->dateTime('pick_up_cruise_datetime')->nullable();
            $table->dateTime('etd_ush')->nullable();
            $table->dateTime('eta_datetime')->nullable();
            $table->string('air_route')->nullable();
            $table->string('client_id')->nullable();
            $table->string('comment')->nullable();
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
