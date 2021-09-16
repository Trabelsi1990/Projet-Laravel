<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeolocalisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geolocalisations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adresse');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->bigInteger('magasin_id');
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
        Schema::dropIfExists('geolocalisations');
    }
}
