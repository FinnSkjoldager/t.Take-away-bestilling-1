<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orderitem', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('OrderID');
            $table->integer('ItemID');
            $table->integer('Quantity');
	    });
    }
    public function down()
    {
        Schema::dropIfExists('orderitem');
    }
};
