@extends('layout.admin')
 
@section('title', 'Ubah Buku')
@section('subtitle', 'Perbarui data buku yang dipilih')
 
@section('content')
  <div class="text-start">
    <form action="{{ route('admin.buku.update', $buku) }}" method="POST">
      @csrf
        @method('PUT')
      @include('admin.buku._form')
 
      <div class="d-flex gap-2">
        <button type="submit" class="btn-custom btn-custom-primary">
          <i class="bi bi-check-lg"></i> Simpan Perubahan
        </button>
        <a href="{{ route('admin.buku.index') }}" class="btn-custom btn-custom-secondary">
          Batal
        </a>
      </div>
    </form>
  </div>
@endsection
