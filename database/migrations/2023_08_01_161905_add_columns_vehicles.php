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
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('make',30);
            $table->string('model',);
            $table->integer('_year');
            $table->renameColumn('id_number', 'plate_number');
            $table->unsignedBigInteger('plate_source');
            $table->string('category',30);
            $table->smallInteger('cylender');
            $table->date('licence_issue_date');
            $table->date('licence_expiry_date');
            $table->string('insurance_type');
            $table->string('area');
            $table->string('zone');
            $table->unsignedBigInteger('rider_id');
            $table->date('vehicle_receive_date');
            $table->date('vehicle_return_date');
            $table->foreign('rider_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plate_source')->references('id')->on('cities')->onDelete('cascade');
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropIndex(['vehicles_rider_id_foreign']);
            $table->dropColumn(['make', 'model', '_year','plate_source','category','cylender',
        'licence_issue_date','licence_expiry_date','insurance_type','area','zone','rider_id','vehicle_receive_date','vehicle_return_date']);
        });
    }
};
