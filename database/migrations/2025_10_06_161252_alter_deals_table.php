<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->enum('type', ['combo', 'discount'])->default('discount');
            $table->decimal('discount', 8, 2);
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
            $table->dropColumn('discount_percentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('discount');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('discount_percentage');
        });
    }
};