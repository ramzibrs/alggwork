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
        Schema::create('travailles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('user_name');
            $table->string('intitule');
            $table->biginteger('salaire');
            $table->biginteger('horaires');
            $table->string('nom_wilaya');
            $table->string('localisation');
            $table->string('information')->nullable();
            $table->string('diplome')->nullable();
            $table->string('necessite')->nullable();
            $table->string('contrat');
            $table->tinyInteger('approuvé')->default('0');
            $table->string('photo');
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
        Schema::dropIfExists('travailles');
    }
};
