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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            // Relasi ke UMKM
            $table->foreignId('umkm_id')->constrained('umkms')->onDelete('cascade');

            // Detail Menu
            $table->string('nama_menu');
            $table->text('deskripsi_menu')->nullable();
            $table->decimal('harga', 10, 2);

            // Kategori & Stok
            $table->enum('kategori', ['makanan', 'minuman', 'snack'])->default('makanan');
            $table->boolean('is_available')->default(true);

            // Gambar Menu
            $table->string('gambar_menu')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
