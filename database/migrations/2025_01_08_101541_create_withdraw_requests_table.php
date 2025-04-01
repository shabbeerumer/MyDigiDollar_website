<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Check if table doesn't exist before creating
        if (!Schema::hasTable('withdraw_requests')) {
            Schema::create('withdraw_requests', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('payment_methods');
                $table->string('address');
                $table->string('account_number');
                $table->string('name');
                $table->string('user_name');
                $table->string('package_name');
                $table->decimal('withdraw_amount', 10, 2);
                $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
                $table->boolean('is_processed')->default(false);
                $table->timestamps();
    
                $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraw_requests');
    }
};
