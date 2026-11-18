@extends('layouts.app')

@section('title', 'Data Perlengkapan')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
          <div>
            <h4 class="card-title mb-1">Data Perlengkapan K3</h4>
            <p class="card-description mb-0">Pemantauan stok dan batas minimum perlengkapan.</p>
          </div>
          <a href="{{ route('perlengkapan.create') }}" class="btn btn-primary btn-icon-text mt-2 mt-md-0">
            <i class="ti-plus btn-icon-prepend"></i> Tambah
          </a>
        </div>

        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <form action="{{ route('perlengkapan.index') }}" method="GET" class="form-inline mb-3">
          <input type="text" name="q" class="form-control mr-2 mb-2" placeholder="Cari nama atau kategori"
            value="{{ request('q') }}">
          <button type="submit" class="btn btn-outline-primary mb-2 mr-2">Cari</button>
          @if (request()->filled('q'))
            <a href="{{ route('perlengkapan.index') }}" class="btn btn-light mb-2">Reset</a>
          @endif
        </form>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Perlengkapan</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Minimum</th>
                <th>Status</th>
                <th class="text-right">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($items as $item)
                <tr>
                  <td>{{ $items->firstItem() + $loop->index }}</td>
                  <td>
                    {{ $item->nama }}
                    @if ($item->keterangan)
                      <br><small class="text-muted">{{ $item->keterangan }}</small>
                    @endif
                  </td>
                  <td>{{ $item->kategori }}</td>
                  <td>{{ $item->stok }} {{ $item->satuan }}</td>
                  <td>{{ $item->stok_minimum }}</td>
                  <td>
                    <label class="badge {{ $item->menipis ? 'badge-danger' : 'badge-success' }}">
                      {{ $item->status }}
                    </label>
                  </td>
                  <td class="text-right text-nowrap">
                    <a href="{{ route('perlengkapan.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('perlengkapan.destroy', $item) }}" method="POST" class="d-inline"
                      onsubmit="return confirm({{ \Illuminate\Support\Js::from('Hapus ' . $item->nama . '?') }})">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center text-muted py-4">Belum ada data perlengkapan.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          {{ $items->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
