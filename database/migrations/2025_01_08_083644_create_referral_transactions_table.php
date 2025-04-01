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
        
        Schema::create('referral_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('referrer_id');
            $table->string('referred_user_id');
            $table->string('reward_amount', 10, 2);
            $table->boolean('first_package_reward')->default(false);
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referral_transactions');
    }
};
