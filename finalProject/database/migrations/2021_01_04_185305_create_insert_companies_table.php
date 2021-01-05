<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsertCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insert_companies', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->string('name');
            $table->longText('description');
            $table->string('address');
            $table->string('Tel');
            $table->string('ownerName');
            $table->string('image');
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
        Schema::dropIfExists('insert_companies');
    }
}
