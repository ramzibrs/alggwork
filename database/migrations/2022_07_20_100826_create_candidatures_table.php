<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('user_name');
            $table->bigInteger('trv_id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_de_naissanse');
            $table->string('diplome_formation')->nullable();
            $table->string('adresse');
            $table->string('nom_wilaya');
            $table->bigInteger('numero_de_telephone');
            $table->string('adresse_email')->nullable();
            $table->string('cv');
            $table->tinyInteger('approuvé')->default('0');
            $table->string('genre');
            $table->string('intitule');
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
        Schema::dropIfExists('candidatures');
    }
};
