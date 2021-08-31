<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('relation_id')->unsigned();
            $table->string('relation_type');
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->bigInteger('country_id');
            $table->bigInteger('city_id');
            $table->bigInteger('district_id');
            $table->bigInteger('neighbourhood_id');
            $table->text('address');
            $table->boolean('default')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
