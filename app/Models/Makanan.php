<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;
    protected $table = 'niken_makanan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'cover_image',
        'kategori_id',
    ];

    public function kategoris()
{
    return $this->belongsToMany(
        Kategori::class,
        'kategori_makanan', // nama tabel pivot
        'makanan_id',       // foreign key milik model ini
        'kategori_id'       // foreign key milik model Kategori
    )->withTimestamps();
}


}
