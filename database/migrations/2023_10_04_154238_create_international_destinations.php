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
        Schema::create('international_destinations', function (Blueprint $table) {
            $table->id('international_destination_id');
            $table->text('international_destination_image');
            $table->string('international_destination_name');
            $table->string('international_price');
            $table->unsignedBigInteger('destination_id');
            $table->boolean('status')->default(true);
            $table->foreign('destination_id')->references('destination_id')
            ->on('destinations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('international_destinations');
    }
};
