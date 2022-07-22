<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();

            // tipo
            $table->boolean('view')->default(false);
            $table->boolean('category')->default(false);
            $table->boolean('product')->default(false);
            $table->boolean('sale')->default(false);
            //

            // tipo info
            $table->string('view_name', 50)->nullable();
            $table->integer('category_id')->nullable();
            $table->string('category_title', 50)->nullable();
            $table->integer('product_id')->nullable();
            $table->string('product_name', 50)->nullable();
            $table->integer('order_id')->nullable();

            // date
            $table->bigInteger('dateTime');

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
        Schema::dropIfExists('statistics');
    }
}
