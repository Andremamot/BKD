<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pegawai extends Model
{
    //
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = ['pegawai_nip', 'pegawai_nama', 'pegawai_glr_depan', 'pegawai_glr_blkng', 'pegawai_jabatan', 'pegawai_golongan','pegawai_unor', 'pegawai_status'];
}
