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
        Schema::create('monthly_rent_reports', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('building_id');
            $table->unsignedBigInteger('floor_id');
            $table->unsignedBigInteger('flat_id');
            $table->unsignedBigInteger('renter_id')->nullable();
            $table->date('month');
            $table->decimal('rent_fee', 10, 2)->default(0);
            $table->decimal('total_utilities', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2)->default(0);
            $table->decimal('previous_due', 10, 2)->default(0);
            $table->decimal('previous_advance', 10, 2)->default(0);
            $table->decimal('amount_paid', 10, 2)->default(0);
            $table->decimal('due_amount', 10, 2)->default(0);
            $table->decimal('advance_balance', 10, 2)->default(0);
            $table->enum('status', ['pending', 'partial', 'paid'])->default('pending')->comment('Pending, Partial, Paid');
            $table->text('note')->nullable();

            $table->unique(['flat_id', 'month']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_rent_reports');
    }
};
