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
            Schema::create('kurirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penjual')->constrained('penjuals')->onDelete('cascade');
            $table->string('nama_kurir');
            $table->string('no_telepon', 20);
            $table->timestamps();
            });
            }

            /**
             * Reverse the migrations.
             */
            public function down(): void
            {
            Schema::dropIfExists('kurirs');
            }
     
    
};
