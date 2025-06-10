<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id();                    // id auto increment primary key
            $table->string('nama');          // nama motor (varchar)
            $table->integer('harga');        // harga motor (integer)
            $table->string('gambar');        // nama file gambar (varchar)
            $table->timestamps();            // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
}
