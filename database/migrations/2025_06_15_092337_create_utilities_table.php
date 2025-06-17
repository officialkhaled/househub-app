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
        Schema::create('utilities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('flat_id')->nullable();
            $table->string('name');
            $table->decimal('amount', 10, 2);
//            $table->enum('type', ['electricity', 'water', 'gas', 'other'])->default('other');
            $table->enum('status', ['active', 'inactive'])->default('active')->comment('Active, Inactive');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilities');
    }
};
