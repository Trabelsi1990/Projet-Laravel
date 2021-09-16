<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image1')->nullable();
            $table->longText('description')->nullable();
            $table->string('nom_fondatrice')->nullable();
            $table->string('image2')->nullable();
            $table->longText('description2')->nullable();
            $table->string('nom_photographe')->nullable();
            $table->string('image_photographe')->nullable();
            $table->longText('description_photographe')->nullable();
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
        Schema::dropIfExists('propos');
    }
}
