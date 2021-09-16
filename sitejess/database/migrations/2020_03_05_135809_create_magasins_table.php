<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagasinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magasins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('image')->nullable();
            $table->enum('categorie',['restaurant','bars','coffee-time','shop']);
            $table->longText('description');
            $table->string('site')->nullable();
            $table->boolean('inCaroussel');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('magasins');
    }
}
