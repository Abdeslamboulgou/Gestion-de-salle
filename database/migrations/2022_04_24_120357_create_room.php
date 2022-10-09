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
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->integer('id_owner')->unsigned()->default(1);
            $table->foreign('id_owner')->references('id')->on('users');
            $table->string('name',255);
            $table->dateTime('openingDate');
            $table->dateTime('closingDate');
            $table->boolean('suspension')->default(false);
            $table->string('type',255)->default('C02');
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
        Schema::dropIfExists('rooms');
    }
};
