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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('user_name');
            $table->tinyInteger('approuvé')->default('0');
            $table->string('titre');
            $table->string('sous_titre');
            $table->tinyInteger('tendance')->default('0');
            $table->string('nom_wilaya');
            $table->string('adresse');
            $table->bigInteger('numero_de_telephone');
            $table->string('adresse_email')->nullable();
            $table->longText('description');
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
        Schema::dropIfExists('annonces');
    }
};
