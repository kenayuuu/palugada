<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakaian extends Model
{
    use HasFactory;
    protected $table = 'niken_pakaians';
    protected $fillable = [
        'nama',
        'ukuran',
        'harga',
        'cover_image'
    ];

}
