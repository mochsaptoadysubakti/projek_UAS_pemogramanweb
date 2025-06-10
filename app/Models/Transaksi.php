<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Disesuaikan dengan nama kolom dari file migrasi terbaru Anda.
     */
    protected $fillable = [
        'user_id',
        'motor_id',
        'start_date',
        'duration',
        'payment_method',
        'total_biaya',
        'status',
    ];

    /**
     * Mendefinisikan relasi ke model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendefinisikan relasi ke model Motor.
     */
    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }
}