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
        Schema::create('shop_loyalty_card_discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loyalty_card_id');
            $table->unsignedBigInteger('user_id');
            $table->float('discount_percent')->default(1);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_loyalty_card_discounts');
    }
};
