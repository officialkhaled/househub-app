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
        Schema::create('renter_flat_assigns', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('renter_id');
            $table->unsignedBigInteger('flat_id');
            $table->date('start_month');
            $table->date('end_month')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renter_flat_assigns');
    }
};
