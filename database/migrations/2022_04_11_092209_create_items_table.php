<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained();
            $table->foreignId('order_id')->nullable();
            $table->string('size', 10);
            $table->string('barCode', 40);
            $table->boolean('available')->default(true);
            $table->boolean('inCart')->default(false);
            $table->bigInteger('inCartTime')->nullable();
            $table->boolean('sold')->default(false);

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
        Schema::dropIfExists('items');
    }
}
