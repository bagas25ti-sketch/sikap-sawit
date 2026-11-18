<?php

namespace App\Http\Controllers;

use App\Models\Perlengkapan;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'totalJenis'  => Perlengkapan::count(),
            'totalStok'   => (int) Perlengkapan::sum('stok'),
            'jumlahTipis' => Perlengkapan::menipis()->count(),
            'menipis'     => Perlengkapan::menipis()->orderBy('nama')->get(),
        ]);
    }
}
