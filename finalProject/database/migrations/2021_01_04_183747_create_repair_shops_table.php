<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairShops', function (Blueprint $table) {
            $table->id();
            $table->integer('companyID');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('ZIPcode');
            $table->integer('ratingPoints');
            $table->integer('ratingUser');
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
        Schema::dropIfExists('repair_shops');
    }
}
