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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id('destination_id');
            $table->string('destination_name');
            $table->string('destination_banner_image');
            $table->string('destination_card_image');
            $table->string('destination_starting_price');
            $table->string('destination_slug');
            $table->text('destination_seo_description');
            $table->unsignedBigInteger('destination_type_id');
            $table->foreign('destination_type_id')->references('id')->on('destination_types')->cascadeOnDelete();
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
        Schema::dropIfExists('destinations');
    }
};
