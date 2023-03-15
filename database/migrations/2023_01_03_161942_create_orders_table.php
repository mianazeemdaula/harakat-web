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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('user_id');
            $table->string('extra_note')->nullable();
            $table->char('status', 20)->default('open');
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('process_at')->nullable();
            $table->timestamp('dispatch_at')->nullable();
            $table->timestamp('picked_at')->nullable();
            $table->timestamp('deliver_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->float('vat')->default(0);
            $table->float('delivery_amount')->default(0);
            $table->float('gross_amount');
            $table->float('total_amount');
            $table->string('drop_address')->nullable();
            $table->point('drop_location')->nullable();
            $table->string('payment_type')->default('cod');
            $table->unsignedBigInteger('payment_card')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
