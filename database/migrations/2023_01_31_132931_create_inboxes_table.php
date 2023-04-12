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
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->morphs('inboxable')->nullable();
            // $table->boolean('star')->default(false);
            $table->string('title');
            $table->string('title_ar');
            $table->string('short_desc')->nullable();
            $table->string('short_desc_ar')->nullable();
            $table->mediumText('content')->nullable()->default('text');
            $table->mediumText('content_ar')->nullable()->default('text');
            $table->boolean('read')->default(false);
            $table->boolean('star')->default(false);
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
        Schema::dropIfExists('inboxes');
    }
};
