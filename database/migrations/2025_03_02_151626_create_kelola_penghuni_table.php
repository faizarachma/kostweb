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
    Schema::create('kelola_penghuni', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('email')->unique();
        $table->string('no_whatsapp');
        $table->date('tanggal_lahir');
        $table->text('alamat');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_penghuni');
    }
};
