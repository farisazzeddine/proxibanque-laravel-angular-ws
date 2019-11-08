<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConseillersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conseillers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Conseiller_id');
            $table->unsignedInteger('Client_id');
            $table->foreign('Client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('conseillers');
    }
}
