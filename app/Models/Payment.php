<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'user_id',
        'payment_date',
        'amount',
        'payment_method',
        'proof_of_payment',
        'status',
        'notes',
    ];

    // Properti dan method model Anda yang lain bisa ditambahkan di sini
}