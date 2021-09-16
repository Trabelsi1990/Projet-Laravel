<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateHorairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('hor_ouverture')->nullable();
            $table->time('hor_fer_mat')->nullable();
            $table->time('hor_deb_aprem')->nullable();
            $table->time('hor_fermeture')->nullable();
            $table->bigInteger('magasin_id');
            $table->boolean('fermer')->Nullable;
            $table->enum('jours',[
                'lundi','mardi','mercredi','jeudi',
                'vendredi','samedi','dimanche'
            ]);
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
        Schema::dropIfExists('horaires');
    }
}
