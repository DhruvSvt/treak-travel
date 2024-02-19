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
        Schema::create('tour_subcategories', function (Blueprint $table) {
            $table->id('tour_subcategories_id');
            $table->string('tour_subcategory_name');
            $table->boolean('status')->default(true);
            $table->text('seo_description');
            $table->unsignedBigInteger('tour_categories_id');
            $table->foreign('tour_categories_id')->references('id')->on('tour_categories')->cascadeOnDelete();
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
        Schema::dropIfExists('tour_subcategories');
    }
};
