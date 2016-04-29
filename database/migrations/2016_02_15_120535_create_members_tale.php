<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Membres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->char('sexe',1);
            $table->string('addresse');
            $table->string('localite');
            $table->string('email');
            $table->string('Phone');
            $table->bigInteger('nrId');
            $table->string('datedenaissance');
            $table->string('debutCot');
            $table->string('FinCot');
            $table->boolean('renouvellement');
            $table->boolean('actif');
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
        Schema::drop('Membres');
    }
}
