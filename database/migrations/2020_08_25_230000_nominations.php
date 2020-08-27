<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nominations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->unsignedTinyInteger('group1')->default(0);
            $table->string('name1')->nullable();
            $table->string('membership1')->nullable();
            $table->unsignedTinyInteger('group2')->default(0);
            $table->string('name2')->nullable();
            $table->string('membership2')->nullable();
            $table->unsignedTinyInteger('group3')->default(0);
            $table->string('fname3')->nullable();
            $table->string('lname3')->nullable();
            $table->string('year3')->nullable();
            $table->string('membership3')->nullable();
            $table->unsignedTinyInteger('group4')->default(0);
            $table->string('fname4')->nullable();
            $table->string('lname4')->nullable();
            $table->string('year4')->nullable();
            $table->string('membership4')->nullable();
            $table->unsignedTinyInteger('group5')->default(0);
            $table->string('fname5')->nullable();
            $table->string('lname5')->nullable();
            $table->string('year5')->nullable();
            $table->string('membership5')->nullable();
            $table->unsignedTinyInteger('group6')->default(0);
            $table->string('fname6')->nullable();
            $table->string('lname6')->nullable();
            $table->string('membership6')->nullable();
            $table->string('team6')->nullable();
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
        Schema::dropIfExists('nominations');
    }
}
