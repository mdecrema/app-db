<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('user_id');
            // Person details
            $table->text('name')->nullable();
            $table->smallInteger('weight');
            $table->smallInteger('height');
            $table->smallInteger('footLength');
            $table->text('level')->nullable();

            // Equipment required
            $table->text('packType')->nullable();
            $table->boolean('ski')->default(false);
            $table->boolean('boots')->default(false);
            $table->boolean('helmet')->default(false);

            // Rent Amount
            $table->float('amount', 6, 2)->default(0);

            // Equipment details
            $table->smallInteger('ski_id')->nullable();
            $table->smallInteger('snowboard_id')->nullable();
            $table->smallInteger('ciaspole_id')->nullable();
            $table->smallInteger('boots_id')->nullable();
            $table->bigInteger('date');

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
        Schema::dropIfExists('rents');
    }
}
