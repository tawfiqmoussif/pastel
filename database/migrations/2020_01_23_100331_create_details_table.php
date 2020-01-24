<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('commande_id')->unsigned();
            $table->foreign('commande_id')->references('id')->on('commandes');
            $table->integer('couleur_id')->unsigned();
            $table->foreign('couleur_id')->references('id')->on('couleurs');
            $table->integer('qte');
            $table->double('prix_initial', 8, 2);
            $table->integer('promotion');
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
        Schema::dropIfExists('details');
    }
}
