<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->json('items_id');
            // User details
            $table->string('firstName', 50);
            $table->string('lastName', 50);
            $table->string('email', 100);
            $table->string('phone', 50);
            $table->string('street', 50);
            $table->smallInteger('house');
            $table->string('city', 50);
            $table->string('area', 50);
            $table->string('postcode', 10);
            $table->string('doorName', 50);

            // Order details
            $table->boolean('newOrder')->default(true);
            $table->string('dateNewOrder')->nullable();
            $table->boolean('pending')->default(true);
            $table->boolean('inProgress')->default(false);
            $table->string('dateInProgress')->nullable();
            $table->boolean('delivered')->default(false);
            $table->string('dateDelivered')->nullable();

            $table->float('fullAmount', 6, 2);

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
        Schema::dropIfExists('orders');
    }
}
