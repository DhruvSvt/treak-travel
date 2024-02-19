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
        Schema::create('tour_itineries', function (Blueprint $table) {
            $table->id('tours_itineries_id');
            $table->string('tours_itineries_title');
            $table->text('tours_itineries_desc');
            $table->unsignedBigInteger('tour_id');
            $table->foreign('tour_id')->references('tours_id')->on('tours')->cascadeOnDelete();
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
        Schema::dropIfExists('tour_itineries');
    }
};
