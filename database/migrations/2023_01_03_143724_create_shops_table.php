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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('city_id');
            $table->string('shop_name')->nullable()->default('text');
            $table->string('phone',20)->nullable()->default('text');
            $table->float('base_delivery_charges')->nullable()->default(1.0);
            $table->float('delivery_charges_km')->nullable()->default(1.0);
            $table->float('min_order_amount')->nullable()->default(1.0);
            $table->float('delivery_radius')->nullable()->default(1.0);
            $table->smallInteger('prepration_time')->nullable()->default(10);
            $table->smallInteger('min_delivery_time')->nullable()->default(10);
            $table->smallInteger('max_delivery_time')->nullable()->default(10);
            $table->string('address')->nullable()->default('text');
            $table->point('location')->nullable();
            $table->char('status',20)->default('pending');
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
        Schema::dropIfExists('shops');
    }
};
