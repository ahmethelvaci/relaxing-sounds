<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sounds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('library_id');
            $table->string('name');
            $table->string('src');
            $table->timestamps();

            $table->foreign('library_id')->references('id')->on('libraries');
            $table->index('library_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sounds');
    }
}
