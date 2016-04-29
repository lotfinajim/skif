<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categorieCompteur');
            $table->unsignedTinyInteger('mailLu');
            $table->unsignedTinyInteger('mailNonLu');
            $table->unsignedTinyInteger('TotalMail');
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
        Schema::drop('compteur');
    }
}
