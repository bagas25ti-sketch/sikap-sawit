@extends('layouts.app')

@section('title', 'Edit Perlengkapan')

@section('content')
<div class="row">
  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Perlengkapan</h4>
        <p class="card-description">Ubah data <strong>{{ $perlengkapan->nama }}</strong>.</p>

        <form action="{{ route('perlengkapan.update', $perlengkapan) }}" method="POST">
          @csrf
          @method('PUT')
          @include('perlengkapan._form')
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
