<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nss');
            $table->string('nama');
            $table->text('alamat');
            $table->unsignedbigInteger('desa_id');
            $table->bigInteger('rw');
            $table->bigInteger('rt');
            $table->bigInteger('no_telpon');
            $table->string('no_fax');
            $table->string('lat_long');
            $table->text('image');
            $table->string('email');
            $table->string('kepala_sekolah');
            $table->timestamps();

            $table->foreign('desa_id')->references('id')->on('desas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sekolah');
    }
};
