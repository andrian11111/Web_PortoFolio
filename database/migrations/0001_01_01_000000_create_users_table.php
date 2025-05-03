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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID sebagai primary key
            $table->string('name'); // Nama pengguna
            $table->string('password'); // Password pengguna
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });

        // Menghapus tabel-tabel lainnya, karena tidak diperlukan lagi
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Menghapus tabel users
    }
};
