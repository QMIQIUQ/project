<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracelTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pracel_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('parcelTrackID');
            $table->string('UserID');
            $table->string('OrderID');
            $table->string('phoneStatus');
            $table->string('ShippingTime');
            $table->date('ShippingDate');
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
        Schema::dropIfExists('pracel_tracks');
    }
}
