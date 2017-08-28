<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accruals', function (Blueprint $table) {
            $table->integer('accruals_good_type')->nullable()->comment = 'Тип товара';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accruals', function (Blueprint $table) {
            $table->dropColumn('accruals_good_type');
        });
    }
}
