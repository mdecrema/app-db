<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('nome', 50);
            $table->string('photo1', 150)->nullable();
            $table->string('photo2', 150)->nullable();
            $table->string('photo3', 150)->nullable();
            $table->string('photo4', 150)->nullable();
            $table->string('photo5', 150)->nullable();
            $table->string('categoria', 50);
            $table->string('genere', 10);
            $table->text('description', 2000);
            $table->string('colore', 20);
            $table->json('sizes')->nullable();
            $table->string('brand', 50);
            $table->float('amount', 6, 2);
            $table->SmallInteger('availability')->default(1);
            $table->SmallInteger('valutazione');
            $table->string('appView')->nullable();

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
        Schema::dropIfExists('products');
    }
}
