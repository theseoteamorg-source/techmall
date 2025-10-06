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
        Schema::table('coupons', function (Blueprint $table) {
            $table->decimal('min_spend', 10, 2)->nullable()->after('value');
            $table->integer('usage_limit')->nullable()->after('min_spend');
            $table->integer('usage_limit_per_user')->nullable()->after('usage_limit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn('min_spend');
            $table->dropColumn('usage_limit');
            $table->dropColumn('usage_limit_per_user');
        });
    }
};
