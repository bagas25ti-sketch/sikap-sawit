@php
  $kategoriDipilih = old('kategori', $perlengkapan->kategori);
@endphp

<div class="form-group">
  <label for="nama">Nama Perlengkapan</label>
  <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror"
    value="{{ old('nama', $perlengkapan->nama) }}" placeholder="Contoh: Helm Safety">
  @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
  <label for="kategori">Kategori</label>
  <select id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror">
    @foreach (\App\Models\Perlengkapan::KATEGORI as $kategori)
      <option value="{{ $kategori }}" @selected($kategoriDipilih === $kategori)>{{ $kategori }}</option>
    @endforeach
  </select>
  @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="stok">Stok</label>
      <input type="number" min="0" id="stok" name="stok" class="form-control @error('stok') is-invalid @enderror"
        value="{{ old('stok', $perlengkapan->stok) }}">
      @error('stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="stok_minimum">Stok Minimum</label>
      <input type="number" min="0" id="stok_minimum" name="stok_minimum"
        class="form-control @error('stok_minimum') is-invalid @enderror"
        value="{{ old('stok_minimum', $perlengkapan->stok_minimum) }}">
      @error('stok_minimum') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="satuan">Satuan</label>
      <input type="text" id="satuan" name="satuan" class="form-control @error('satuan') is-invalid @enderror"
        value="{{ old('satuan', $perlengkapan->satuan) }}" placeholder="pcs / pasang">
      @error('satuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
  </div>
</div>

<div class="form-group">
  <label for="keterangan">Keterangan <small class="text-muted">(opsional)</small></label>
  <textarea id="keterangan" name="keterangan" rows="3"
    class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $perlengkapan->keterangan) }}</textarea>
  @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-primary mr-2">Simpan</button>
<a href="{{ route('perlengkapan.index') }}" class="btn btn-light">Batal</a>
