<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarousselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caroussels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('image');
            $table->longText('description');
            $table->bigInteger('magasin_id')->nullable();
            $table->bigInteger('artisan_id')->nullable();
            $table->bigInteger('evenement_id')->nullable();
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
        Schema::dropIfExists('caroussels');
    }
}
