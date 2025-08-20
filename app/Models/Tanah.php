<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanah extends Model
{
    use HasFactory;

    protected $table = 'tanah';

    protected $fillable = [
    'nama_tanah',
     'kode_tanah',
     'luas', 
     'no_sertifikat'
    ];

    // Relasi: Tanah hasMany Bangunan
    public function bangunan()
    {
        return $this->hasMany(Bangunan::class);
    }

}
