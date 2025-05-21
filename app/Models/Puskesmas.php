<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    use HasFactory;

    protected $table = 'puskesmas';
    protected $primaryKey = 'id_puskesmas';

    protected $fillable = [
        'nama_puskesmas',
        'alamat_puskesmas',
        'telp_puskesmas',
        'identitas_puskesmas',
        'gambar_puskesmas',
        'motto',
        'visi',
        'misi',
        'jam_layanan',
        'pelayanan',
    ];
}
