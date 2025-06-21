<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Decimal;

return new class extends Migration
{


    
    public function up(): void
    {
        Schema::create('kategori_produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produk')->constrained('produks')->onDelete('cascade');
            $table->foreignId('id_kategori')->constrained('kategoris')->onDelete('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_produks');
    }

   
};
