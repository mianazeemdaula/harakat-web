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
        Schema::create('riders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->default(12);
            $table->string('rider_name', 100)->nullable()->default('text');
            $table->string('category_id', 100)->nullable()->default('text');
            $table->string('fullname', 100)->nullable()->default('text');
            $table->string('city', 100)->nullable()->default('text');
            $table->string('phone', 100)->nullable()->default('text');
            $table->string('address', 100)->nullable()->default('text');
            $table->string('licence', 100)->nullable()->default('text');
            $table->string('other_licence', 100)->nullable()->default('text');
            $table->string('awards', 100)->nullable()->default('text');
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
        Schema::dropIfExists('riders');
    }
};
