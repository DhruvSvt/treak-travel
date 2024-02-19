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
        Schema::create('featured_destinations', function (Blueprint $table) {
            $table->id('featured_destination_id');
            $table->text('featured_destination_image');
            $table->string('featured_destination_name');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('destination_id')
            ->on('destinations')->cascadeOnDelete();

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
        Schema::dropIfExists('featured_destinations');
    }
};
