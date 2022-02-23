<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcaraModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acara', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->text('tempat')->nullable();
            $table->text('alamat')->nullable();
            $table->text('maps')->nullable();
            $table->text('longlat')->nullable();
            $table->enum('flag', ['akad', 'lamaran', 'resepsi', 'ulangtahun', 'syukuran'])->default('resepsi');
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
        Schema::dropIfExists('acara');
    }
}
