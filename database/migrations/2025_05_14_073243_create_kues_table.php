<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kues', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kue');
            $table->text('deskripsi');
            $table->integer('harga');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('kues');
    }
};
