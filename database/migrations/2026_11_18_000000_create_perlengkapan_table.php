<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perlengkapan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kategori')->default('APD');
            $table->unsignedInteger('stok')->default(0);
            $table->unsignedInteger('stok_minimum')->default(0);
            $table->string('satuan', 20)->default('pcs');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perlengkapan');
    }
};
