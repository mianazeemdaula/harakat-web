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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('city_id');
            $table->string('shop_name')->nullable()->default('text');
            $table->string('fullname')->nullable()->default('text');
            $table->string('phone',15)->nullable()->default('text');
            $table->string('address')->nullable()->default('text');
            $table->string('licence')->nullable()->default('text');
            $table->string('other_licence')->nullable()->default('text');
            $table->string('awards')->nullable()->default('awards');
            $table->float('base_delivery_charges')->nullable()->default(1.0);
            $table->float('delivery_charges_km')->nullable()->default(1.0);
            $table->float('min_order_amount')->nullable()->default(1.0);
            $table->float('delivery_radius')->nullable()->default(1.0);
            $table->time('prepration_time')->nullable()->default(1.0);
            $table->time('min_delivery_time')->nullable()->default(1.0);
            $table->time('max_delivery_time')->nullable()->default(1.0);
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
        Schema::dropIfExists('merchants');
    }
};
