<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'tanggal_mulai',
        'tanggal_selesai',
        'kuota',
        'status',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}