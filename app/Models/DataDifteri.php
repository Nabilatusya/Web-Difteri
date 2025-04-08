<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDifteri extends Model
{
    use HasFactory;

    protected $table = 'data_difteri'; // Nama tabel sesuai dengan migration

    protected $primaryKey = 'id_data'; // Sesuai dengan migration

    public $timestamps = false; // Karena di migration tidak ada timestamps

    protected $fillable = [
        'id_tahun',
        'id_kecamatan',
        'jml_kepadatan',
        'jml_rumah_tidak_sehat', // Sesuai dengan migration
        'jml_vaksinasi_dpt', // Sesuai dengan migration
        'jml_kasus_difteri', // Sesuai dengan migration
        'cluster', // Sesuai dengan migration
    ];

    // Relasi ke tabel Tahun
    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'id_tahun');
    }

    // Relasi ke tabel Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
}
