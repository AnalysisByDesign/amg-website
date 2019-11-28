<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->tinyInteger('version')->default(1)->unsigned();
            
            $table->string('street1');
            $table->string('street2');
            $table->string('street3');
            $table->string('city');
            $table->string('county');
            $table->string('postcode');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('whatthreewords');
            $table->text('urlGoogleMap');
            
            $table->tinyInteger('dummy')->default(0)->unsigned();
            $table->timestamps();
            
            $table->unique(['street1', 'street2', 'city', 'postcode']);
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