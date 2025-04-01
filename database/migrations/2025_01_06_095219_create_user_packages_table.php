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
        Schema::create('user_packages', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('package_name');
            $table->string('price', 10, 2);
            $table->decimal('daily_earning', 10, 2);
            $table->dateTime('activation_date')->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->timestamp('last_earning_update')->nullable();
            $table->decimal('remaining_balance', 10, 2)->default(0);
            $table->enum('status', ['pending', 'active', 'expired'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_packages');
    }
};
