<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('motors', function (Blueprint $table) {
            // Menambahkan kolom-kolom yang hilang
            $table->string('jenis')->after('nama'); // Menambahkan kolom jenis setelah kolom nama
            $table->text('deskripsi')->nullable()->after('jenis');
            $table->enum('status', ['Tersedia', 'Disewa'])->default('Tersedia')->after('harga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motors', function (Blueprint $table) {
            // Perintah untuk menghapus kolom jika migrasi di-rollback
            $table->dropColumn(['jenis', 'deskripsi', 'status']);
        });
    }
};