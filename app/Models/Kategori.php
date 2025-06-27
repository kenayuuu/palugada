<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'niken_kategori';

    protected $fillable = ['nama_kategori'];

    public function makanans()
{
    return $this->belongsToMany(
        Makanan::class,
        'kategori_makanan',
        'kategori_id',
        'makanan_id'
    )->withTimestamps();
}

}

