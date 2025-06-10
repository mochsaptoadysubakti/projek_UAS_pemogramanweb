<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Motor;

class MotorSeeder extends Seeder
{
    public function run(): void
    {
        Motor::truncate();

        $motors = [
            // Motor Sport
            ['nama' => 'Yamaha R15', 'jenis' => 'Sport', 'deskripsi' => 'Motor sport fairing...', 'harga' => 150000, 'status' => 'Tersedia', 'gambar' => 'r15.jpg'],
            ['nama' => 'Honda CBR150R', 'jenis' => 'Sport', 'deskripsi' => 'Menawarkan keseimbangan...', 'harga' => 155000, 'status' => 'Tersedia', 'gambar' => 'cbr150r.jpg'],
            ['nama' => 'Kawasaki Ninja 250', 'jenis' => 'Sport', 'deskripsi' => 'Legenda di kelas 250cc...', 'harga' => 250000, 'status' => 'Tersedia', 'gambar' => 'ninja250.jpg'],
            
            // Motor Bebek
            ['nama' => 'Honda Supra X 125', 'jenis' => 'Bebek', 'deskripsi' => 'Dikenal sangat irit...', 'harga' => 90000, 'status' => 'Tersedia', 'gambar' => 'suprax125.jpg'],
            ['nama' => 'Yamaha Jupiter MX', 'jenis' => 'Bebek', 'deskripsi' => 'Motor bebek dengan sentuhan sporty...', 'harga' => 95000, 'status' => 'Tersedia', 'gambar' => 'jupitermx.jpg'],
            ['nama' => 'Suzuki Satria F150', 'jenis' => 'Bebek', 'deskripsi' => 'Ayago yang terkenal...', 'harga' => 100000, 'status' => 'Tersedia', 'gambar' => 'satriaf150.jpg'],

            // Motor Matic
            ['nama' => 'Yamaha NMax', 'jenis' => 'Matic', 'deskripsi' => 'Skutik maxi premium...', 'harga' => 100000, 'status' => 'Tersedia', 'gambar' => 'nmax.jpg'],
            ['nama' => 'Honda PCX', 'jenis' => 'Matic', 'deskripsi' => 'Menawarkan kemewahan...', 'harga' => 120000, 'status' => 'Tersedia', 'gambar' => 'pcx.jpg'],
            ['nama' => 'Vespa Primavera', 'jenis' => 'Matic', 'deskripsi' => 'Skutik ikonik dengan desain retro-modern...', 'harga' => 150000, 'status' => 'Tersedia', 'gambar' => 'vespa.jpeg'],
        ];

        foreach ($motors as $motor) {
            Motor::create($motor);
        }
    }
}