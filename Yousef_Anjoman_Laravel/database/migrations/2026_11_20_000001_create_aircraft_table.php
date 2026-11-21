<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('aircraft', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->string('model');
            $table->string('manufacturer');
            $table->unsignedSmallInteger('capacity');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('aircraft'); }
};
