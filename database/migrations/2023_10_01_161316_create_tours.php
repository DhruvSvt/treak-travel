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
        Schema::create('tours', function (Blueprint $table) {
            $table->id('tours_id');
            $table->string('tours_name');
            $table->text('tours_url');
            $table->text('tours_price');
            $table->text('tours_duration');
            $table->text('tours_description');
            $table->text('tours_banner');
            $table->text('tours_gallery');
            $table->unsignedBigInteger('tours_category');
            $table->unsignedBigInteger('tours_subcategory');
            $table->foreign('tours_category')->references('id')->on('tour_categories')->cascadeOnDelete();
            $table->foreign('tours_subcategory')->references('tour_subcategories_id')->on('tour_subcategories')->cascadeOnDelete();
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
        Schema::dropIfExists('tours');
    }
};
