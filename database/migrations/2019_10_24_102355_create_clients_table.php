<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('Conseiller_id');
            $table->foreign('Conseiller_id')->references('id')->on('conseillers');
            $table->unsignedInteger('Agence_id');
            $table->foreign('Agence_id')->references('id')->on('agences');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('cin',10)->unique();
            $table->double('codePostal',8);
            $table->string('ville');
            $table->string('telephone')->unique();
            $table->boolean('compteCourant');
            $table->boolean('compteEpargne');
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('clients');
    }
}
