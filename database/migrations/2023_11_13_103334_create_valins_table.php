<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('valins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->onDelete('cascade');
            $table->foreignId('id_witel')->onDelete('cascade');
            $table->char('id_valins', 8)->unique();
            $table->string('gambar1')->nullable()->default(null);
            $table->string('gambar2')->nullable()->default(null);
            $table->string('gambar3')->nullable()->default(null);
            $table->enum('ram3', [
                'OK',
                'NOK',
                '-'
            ])->default('-');
            $table->foreignId('id_rekon')->onDelete('cascade');
            $table->enum('keterangan', [
                'BT/NONE >=50% Jumlah Dropcore',
                'Foto Bukan dari Web Valins',
                'Foto ODP Luar/Dalam Tidak Ada',
                'Foto Tidak Sesuai',
                'QR Code Asal',
                '-'
            ])->default('-');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valins');
    }
};
