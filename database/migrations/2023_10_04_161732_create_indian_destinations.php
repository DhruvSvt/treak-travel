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
        Schema::create('indian_destinations', function (Blueprint $table) {
            $table->id('indian_destination_id');
            $table->text('indian_destination_image');
            $table->string('indian_destination_name');
            $table->string('indian_price');
            $table->text('seo_descr');
            $table->unsignedBigInteger('destination_id');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('indian_destinations');
    }
};
