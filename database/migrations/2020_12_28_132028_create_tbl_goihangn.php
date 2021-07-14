<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGoihangn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_goihang', function (Blueprint $table) {
            $table->Increments('shipping_id');
            $table->string('shipping_name');
            $table->string('shipping_address');
            $table->string('shipping_phone'); 
            $table->integer('shipping_method');
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
        Schema::dropIfExists('tbl_goihang');
    }
}
