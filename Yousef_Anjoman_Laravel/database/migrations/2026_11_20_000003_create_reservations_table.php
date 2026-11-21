<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('passenger_name');
            $table->string('passenger_email')->nullable();
            $table->string('seat_number', 10);
            $table->foreignId('flight_id')->constrained()->restrictOnDelete();
            $table->string('status')->default('confirmed');
            $table->timestamps();
            $table->unique(['flight_id', 'seat_number']);
        });
    }

    public function down(): void { Schema::dropIfExists('reservations'); }
};
