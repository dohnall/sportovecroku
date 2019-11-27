<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Votes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->unsignedTinyInteger('group1')->default(0);
            $table->unsignedTinyInteger('group2')->default(0);
            $table->unsignedTinyInteger('group3')->default(0);
            $table->unsignedTinyInteger('group4')->default(0);
            $table->unsignedTinyInteger('group5')->default(0);
            $table->unsignedTinyInteger('group6')->default(0);
            $table->unsignedTinyInteger('group7')->default(0);
            $table->string('hash', 32)->nullable();
            $table->ipAddress('ip');
            $table->string('ipcheck', 40)->nullable();
            $table->enum('status', ['new', 'verified', 'new-fake', 'verified-fake'])->default('new');
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
        //
    }
}
