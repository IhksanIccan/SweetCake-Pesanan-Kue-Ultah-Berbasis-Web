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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->text('deskripsi')->nullable();
            $table->decimal('Harga',10,2);
            $table->string('Gambar')->nullable();
            $table->unsignedInteger('stok')->default(0);
            $table->foreignId('id_penjual')->constrained('penjuals')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
      
        Schema::dropIfExists('produks');
        
    }

    
};
