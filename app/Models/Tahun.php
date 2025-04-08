<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tahun extends Model
{
    use HasFactory;

    //Nama tabel sesuai dengan migration
    protected $table = 'tahuns';

    //Primary key sesuai dengan migration
    protected $primaryKey = 'id_tahun';

    //karena di migration tidak ada timestamps
    public $timestamps = false;

    protected $fillable = [
        //sesuai dengan migration
        'tahun_kejadian',
    ];

    //relasi ke DataDifteri (1 Tahun bisa memiliki banyak DataDifteri)
    public function dataDifteri()
    {
        return $this ->hasMany(DataDifteri::class, 'id_tahun');
    }
}
