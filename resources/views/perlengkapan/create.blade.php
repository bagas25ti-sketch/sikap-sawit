@extends('layouts.app')

@section('title', 'Tambah Perlengkapan')

@section('content')
<div class="row">
  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Perlengkapan</h4>
        <p class="card-description">Isi data perlengkapan K3 yang baru.</p>

        <form action="{{ route('perlengkapan.store') }}" method="POST">
          @csrf
          @include('perlengkapan._form')
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
