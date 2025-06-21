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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pembeli')->constrained('pembelis')->onDelete('cascade');
            $table->decimal('Total_Harga',10,2);
            $table->enum('status',['pending','konfirmasi','on delivery','completed','cancelled'])->default('pending');
            $table->boolean('is_paid')->default(false);
            $table->foreignId('id_kurir')->nullable()->constrained('kurirs')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
