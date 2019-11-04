<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteCourantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_courants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('Compte_id')->unique();
            $table->foreign('Compte_id')->references('id')->on('comptes');
            $table->boolean('carteBancaire');
            $table->float('montant');
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
        Schema::dropIfExists('compte_courants');
    }
}
