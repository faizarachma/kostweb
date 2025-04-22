<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('kelola_pemesanan', function (Blueprint $table) {
        $table->id();
        $table->string('nama_penghuni');
        $table->unsignedBigInteger('nomor_kamar');
        $table->unsignedBigInteger('notifikasi_id');
        $table->string('bukti_pembayaran')->nullable();
        $table->enum('status_pembayaran', ['pending', 'lunas', 'gagal']);
        $table->timestamps();

        $table->foreign('nomor_kamar')->references('id')->on('kelola_kamar')->onDelete('cascade');
        $table->foreign('notifikasi_id')->references('id')->on('kelola_notifikasi')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_pemesanan');
    }
};
