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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('total', 8, 2);
            $table->string('coupon_code')->nullable();
            $table->decimal('discount', 8, 2)->default(0);
            $table->string('payment_method')->nullable();
            $table->string('status')->default('processing');
            $table->text('notes')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->index('user_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
