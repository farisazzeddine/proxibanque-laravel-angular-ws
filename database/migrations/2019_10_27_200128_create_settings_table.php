<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Agence_id');
            $table->foreign('Agence_id')->references('id')->on('agences');
            $table->unsignedBigInteger('Gerant_id');
            $table->foreign('Gerant_id')->references('id')->on('gerants');
            $table->float('commissionVirement');
            $table->float('commissionRetrait');
            $table->float('commissionRetraitCheque');
            $table->float('commissionVersement');
            $table->float('fraisOuvertureCompte');
            $table->float('choixChangementCrtGuichet');
            $table->float('DemandeCheque');
            $table->float('fraisDotation');
            $table->float('TransferSldEtranger');
            $table->integer('NbrMxconseillersParclient');
            $table->integer('nbrMxConseillers');
            $table->softDeletesTz('deleted_at');
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
        Schema::dropIfExists('settings');
    }
}
