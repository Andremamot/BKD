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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('pegawai_nip', 18)->primary()->comment('Nomor Induk Pegawai');
            $table->string('pegawai_nama', 100)->comment('Nama Pegawai');
            $table->string('pegawai_glr_depan', 15)->comment('Gelar Depan');
            $table->string('pegawai_glr_blkg', 25)->comment('Gelar Belakang');
            $table->string('pegawai_jabatan', 75)->comment('Jabatan');
            $table->string('pegawai_golongan', 5)->comment('Golongan');
            $table->string('pegawai_unor', 100)->comment('unit Organisasi');
            $table->Enum('pegawai_status', ['0'],'1')->nullable()->comment('status {egawai (0:Tidak Aktif, 1:aktif)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
