<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;

    //sesuai dengannama tabel di migration
    protected $table = 'kecamatans';

    //sesuai dengan migration
    protected $primaryKey = 'id_kecamatan';

    //karena di migration tida ada timestamps
    public $timestamps = false;

    //namakecamatan bisa iisi secara massal
    protected $fillable = [
        'nama_kecamatan',
    ];

    //relasi ke tabel data difteri (jika ada)
    public function dataDifteri(){
        return $this->hasMany(DataDifteri::class, 'id_kecamatan');
    }
}
