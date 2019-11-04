<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteEpargnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_epargnes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('Compte_id')->unique();
            $table->foreign('Compte_id')->references('id')->on('comptes');
            $table->float('tauxDeRum');
            $table->softDeletesTz();
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
        Schema::dropIfExists('compte_epargnes');
    }
}
