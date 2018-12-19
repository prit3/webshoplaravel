<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product')->unsigned();
            $table->integer('asker')->unsigned();
            $table->integer('hidden')->unsigned();
            $table->text('question');
            $table->foreign('product')->references('id')->on('products');;
            $table->foreign('asker')->references('id')->on('users');;
            $table->foreign('hidden')->references('id')->on('users');;
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
        Schema::dropIfExists('“comments”');
    }
}
