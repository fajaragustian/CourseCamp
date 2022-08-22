<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscountIdAndDiscountPercentageAndTotalOnChekoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            //
            $table->foreignId('discount_id')->nullable()->after('camp_id');
            $table->unsignedBigInteger('discount_percentage')->nullable()->after('midtrans_booking_code');
            $table->unsignedBigInteger('total')->default(0)->after('discount_percentage');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            //
            $table->dropForeign('chekouts_discount_id_forigen');
            $table->dropColumn(['discount_id', 'discount_percentage', 'total;']);
        });
    }
}
