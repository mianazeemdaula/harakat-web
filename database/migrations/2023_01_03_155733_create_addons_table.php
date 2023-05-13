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
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('addon_category_id'); // shop
            $table->string('name');
            $table->string('name_ar');
            $table->float('price');
            $table->boolean('available');
            $table->string('description');
            $table->string('description_ar');
            $table->integer('weight')->default(1);
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
        Schema::dropIfExists('addons');
    }
};
