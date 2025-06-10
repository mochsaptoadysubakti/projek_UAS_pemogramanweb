<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // GANTI BAGIAN INI:
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        // MENJADI SEPERTI INI:
        User::updateOrCreate(
            ['email' => 'test@example.com'], // Kondisi untuk mencari user
            [
                'name' => 'Test User',       // Data yang akan di-update atau dibuat baru
                'password' => bcrypt('password'), // Pastikan ada password default
            ]
        );


        // Baris ini tetap sama untuk memanggil seeder motor
        $this->call([
            MotorSeeder::class,
        ]);
    }
}