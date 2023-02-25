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
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('jurusan');
            $table->string('keterangan');
            $table->string('tahun');
            $table->unsignedBigInteger('kurikulum_id');
            $table->unsignedBigInteger('sekolah_id');
            $table->string('akreditasi');
            $table->timestamps();

            $table->foreign('kurikulum_id')->references('id')->on('kurikulums');
            $table->foreign('sekolah_id')->references('id')->on('sekolahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusan');
    }
};
