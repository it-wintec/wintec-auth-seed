<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarberbookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barberbooking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->integer('sid');
            $table->date('sdate');
            $table->integer('stime');
            $table->integer('staff');
            $table->integer('status');
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
        Schema::drop('barberbooking');
    }
}
