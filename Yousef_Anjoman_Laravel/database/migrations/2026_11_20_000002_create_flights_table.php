<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');
            $table->string('origin');
            $table->string('destination');
            $table->dateTime('departure_at');
            $table->dateTime('arrival_at');
            $table->foreignId('aircraft_id')->constrained('aircraft')->restrictOnDelete();
            $table->string('status')->default('scheduled');
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('flights'); }
};
