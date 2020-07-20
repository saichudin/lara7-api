<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_transaksi_id');
            $table->string('nama_customer');
            $table->string('no_ktp');
            $table->string('alamat');
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');
            $table->integer('harga');
            $table->string('jaminan');
            $table->string('catatan');
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
        Schema::dropIfExists('transaksi_model');
    }
}
