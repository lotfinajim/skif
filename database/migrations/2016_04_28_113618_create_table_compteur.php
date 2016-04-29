<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompteur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comtpeur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categorie');
            $table->integer('lu');
            $table->integer('nonLu');
            $table->integer('draft');
            $table->integer('total');
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
        Schema::drop('comtpeur');
    }
}
