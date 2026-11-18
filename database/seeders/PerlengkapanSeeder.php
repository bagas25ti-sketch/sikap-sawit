<?php

namespace Database\Seeders;

use App\Models\Perlengkapan;
use Illuminate\Database\Seeder;

class PerlengkapanSeeder extends Seeder
{
    public function run(): void
    {
        // Empat data pertama mengikuti Tabel 3.1 pada proposal.
        $data = [
            ['nama' => 'Helm',            'kategori' => 'APD', 'stok' => 45, 'stok_minimum' => 30, 'satuan' => 'pcs',   'keterangan' => 'Helm safety untuk pekerja lapangan'],
            ['nama' => 'Sarung tangan',   'kategori' => 'APD', 'stok' => 18, 'stok_minimum' => 30, 'satuan' => 'pasang', 'keterangan' => 'Sarung tangan kerja anti slip'],
            ['nama' => 'Sepatu safety',   'kategori' => 'APD', 'stok' => 25, 'stok_minimum' => 20, 'satuan' => 'pasang', 'keterangan' => null],
            ['nama' => 'Rompi',           'kategori' => 'APD', 'stok' => 12, 'stok_minimum' => 20, 'satuan' => 'pcs',   'keterangan' => 'Rompi reflektif'],
            ['nama' => 'Kacamata safety', 'kategori' => 'APD', 'stok' => 40, 'stok_minimum' => 20, 'satuan' => 'pcs',   'keterangan' => null],
            ['nama' => 'Masker',          'kategori' => 'APD', 'stok' => 60, 'stok_minimum' => 40, 'satuan' => 'pcs',   'keterangan' => 'Masker debu dan pestisida'],
        ];

        foreach ($data as $row) {
            Perlengkapan::updateOrCreate(['nama' => $row['nama']], $row);
        }
    }
}
