<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarteBancairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carte_bancaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('numCartebancair')->unique();
            $table->integer('codeSecretCarte')->unique();
            $table->date('dateExperation');
            $table->enum('typeCarte',['MasterCard','Visa']);
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
        Schema::dropIfExists('carte_bancaires');
    }
}
