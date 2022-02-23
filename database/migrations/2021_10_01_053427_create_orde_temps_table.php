<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdeTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_temps', function (Blueprint $table) {
            $table->id();
            $table->String('order_id');
            $table->String('kode_item');
            $table->Integer('qty');
            $table->Integer('sub_total');
            $table->timestamps();

            $table->foreign('kode_item')
                ->references('kode_item')
                ->on('items')
                ->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_temps');
    }
}
