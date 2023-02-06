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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsingedBigInteger('product_category_id');
            $table->unsingedBigInteger('merchant_id');
            $table->string('name');  
            $table->string('name_ar');  
            $table->float('price');
            $table->float('promo_price')->deafult(0);
            $table->float('vat')->default(0.0);
            $table->time('prepration_time')->default(15);
            $table->string('description');
            $table->string('image');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('products');
    }
};
