<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('building_id');
            $table->unsignedBigInteger('floor_id');
            $table->string('name');
            $table->unsignedTinyInteger('number_of_rooms');
            $table->unsignedInteger('sqft_size');
            $table->decimal('rent_fee', 10, 2);
            $table->text('description')->nullable();
            $table->enum('status', ['available', 'rented', 'leaving_soon'])->default('available')
                ->comment('Available, Rented, Leaving Soon');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
