<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categorieCompteur');
            $table->unsignedTinyInteger('Lu');
            $table->unsignedTinyInteger('nonLu');
            $table->unsignedTinyInteger('Total');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('compteurs');
    }
}
