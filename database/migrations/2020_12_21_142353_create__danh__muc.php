<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhMuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Danh_muc_table', function (Blueprint $table) {
            $table->Increments('category_id');
            $table->string('category_key');
            $table->string('category_parent');
            $table->string('category_name');
            $table->string('category_slug');
            $table->text('category_desc');
            $table->integer('category_status');
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
        Schema::dropIfExists('Danh_muc_table');
    }
}
