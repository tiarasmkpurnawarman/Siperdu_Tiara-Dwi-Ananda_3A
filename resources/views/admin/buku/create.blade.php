@extends('layout.admin')
 
@section('title', 'Tambah Buku')
@section('subtitle', 'Isi formulir berikut untuk menambah buku baru')
 
@section('content')
  <div class="text-start">
    <form action="{{ route('admin.buku.store') }}" method="POST">
      @csrf
 
      @include('admin.buku._form')
 
      <div class="d-flex gap-2">
        <button type="submit" class="btn-custom btn-custom-primary">
          <i class="bi bi-check-lg"></i> Simpan
        </button>
        <a href="{{ route('admin.buku.index') }}" class="btn-custom btn-custom-secondary">
          Batal
        </a>
      </div>
    </form>
  </div>
@endsection
