<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTipeOpsiSkema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skemaopsi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skemaopsigroup_id')->unsigned();
            $table->foreign('skemaopsigroup_id')->references('id')->on('skemaopsigroup');
            $table->string('name_opsi');
            $table->string('value_opsi');
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
