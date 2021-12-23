<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ski', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('length');
            $table->text('level');
            $table->text('brand');
            $table->text('model');
            $table->smallInteger('value');
            $table->text('type');

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
        Schema::dropIfExists('ski');
    }
}