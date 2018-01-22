<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fichiers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('urlimage');
            $table->string('urlvideo');
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::drop('images');
    }
}
