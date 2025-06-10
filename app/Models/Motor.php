<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama', // DIUBAH KEMBALI KE 'nama'
        'jenis',
        'deskripsi',
        'harga',
        'status',
        'gambar',
    ];
}