<?php

namespace App\Http\Controllers;

use App\Models\Perlengkapan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PerlengkapanController extends Controller
{
    public function index(Request $request): View
    {
        $items = Perlengkapan::query()
            ->when($request->filled('q'), function ($query) use ($request) {
                $q = $request->string('q')->toString();
                $query->where(function ($sub) use ($q) {
                    $sub->where('nama', 'like', "%{$q}%")
                        ->orWhere('kategori', 'like', "%{$q}%");
                });
            })
            ->orderBy('nama')
            ->paginate(10)
            ->withQueryString();

        return view('perlengkapan.index', compact('items'));
    }

    public function create(): View
    {
        $perlengkapan = new Perlengkapan(['kategori' => 'APD', 'stok' => 0, 'stok_minimum' => 0, 'satuan' => 'pcs']);

        return view('perlengkapan.create', compact('perlengkapan'));
    }

    public function store(Request $request): RedirectResponse
    {
        Perlengkapan::create($this->validated($request));

        return redirect()->route('perlengkapan.index')
            ->with('success', 'Perlengkapan berhasil ditambahkan.');
    }

    public function show(Perlengkapan $perlengkapan): RedirectResponse
    {
        return redirect()->route('perlengkapan.edit', $perlengkapan);
    }

    public function edit(Perlengkapan $perlengkapan): View
    {
        return view('perlengkapan.edit', compact('perlengkapan'));
    }

    public function update(Request $request, Perlengkapan $perlengkapan): RedirectResponse
    {
        $perlengkapan->update($this->validated($request));

        return redirect()->route('perlengkapan.index')
            ->with('success', 'Perlengkapan berhasil diperbarui.');
    }

    public function destroy(Perlengkapan $perlengkapan): RedirectResponse
    {
        $perlengkapan->delete();

        return redirect()->route('perlengkapan.index')
            ->with('success', 'Perlengkapan berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nama'         => ['required', 'string', 'max:255'],
            'kategori'     => ['required', Rule::in(Perlengkapan::KATEGORI)],
            'stok'         => ['required', 'integer', 'min:0'],
            'stok_minimum' => ['required', 'integer', 'min:0'],
            'satuan'       => ['required', 'string', 'max:20'],
            'keterangan'   => ['nullable', 'string', 'max:1000'],
        ], [
            'required' => ':attribute wajib diisi.',
            'integer'  => ':attribute harus berupa angka bulat.',
            'min'      => ':attribute tidak boleh kurang dari :min.',
            'max'      => ':attribute terlalu panjang (maksimal :max).',
            'in'       => ':attribute tidak valid.',
        ], [
            'nama'         => 'Nama perlengkapan',
            'kategori'     => 'Kategori',
            'stok'         => 'Stok',
            'stok_minimum' => 'Stok minimum',
            'satuan'       => 'Satuan',
            'keterangan'   => 'Keterangan',
        ]);
    }
}
