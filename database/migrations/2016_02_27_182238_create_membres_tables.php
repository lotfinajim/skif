<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('Info_OK');
            $table->string('NrMembre');
            $table->string('Prenom');
            $table->string('Nom');
            $table->char('sexe',1);
            $table->string('Adres');
            $table->string('Localite');
            $table->string('Email');
            $table->string('Phone');
            $table->string('NrID');
            $table->string('DateNaissance');
            $table->string('DebutCot');
            $table->string('FinCot');
            $table->string('RenouvelementSigner');
            $table->string('Actif');
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
        Schema::drop('membres');
    }
}
