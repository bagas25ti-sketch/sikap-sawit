@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <h3 class="font-weight-bold">Selamat datang di SIKAP Sawit</h3>
    <h6 class="font-weight-normal mb-0">
      Ringkasan perlengkapan K3.
      @if ($jumlahTipis > 0)
        <span class="text-danger">{{ $jumlahTipis }} perlengkapan stoknya menipis.</span>
      @else
        <span class="text-success">Semua stok perlengkapan dalam kondisi aman.</span>
      @endif
    </h6>
  </div>
</div>

<div class="row">
  <div class="col-md-4 mb-4 stretch-card transparent">
    <div class="card card-tale">
      <div class="card-body">
        <p class="mb-4">Jenis Perlengkapan</p>
        <p class="fs-30 mb-2">{{ $totalJenis }}</p>
        <p>terdaftar di sistem</p>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-4 stretch-card transparent">
    <div class="card card-dark-blue">
      <div class="card-body">
        <p class="mb-4">Total Stok</p>
        <p class="fs-30 mb-2">{{ number_format($totalStok, 0, ',', '.') }}</p>
        <p>unit seluruh perlengkapan</p>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-4 stretch-card transparent">
    <div class="card card-light-danger">
      <div class="card-body">
        <p class="mb-4">Stok Menipis</p>
        <p class="fs-30 mb-2">{{ $jumlahTipis }}</p>
        <p>di bawah batas minimum</p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Peringatan Stok</h4>
        @forelse ($menipis as $item)
          <div class="alert alert-warning mb-2" role="alert">
            Stok <strong>{{ $item->nama }}</strong> menipis:
            {{ $item->stok }} {{ $item->satuan }} (minimum {{ $item->stok_minimum }}).
          </div>
        @empty
          <p class="text-muted mb-0">Tidak ada peringatan stok saat ini.</p>
        @endforelse
        <a href="{{ route('perlengkapan.index') }}" class="btn btn-primary btn-sm mt-3">Kelola perlengkapan</a>
      </div>
    </div>
  </div>
</div>
@endsection
