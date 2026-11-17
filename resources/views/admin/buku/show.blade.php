@extends('layout.admin')
 
@section('title', 'Detail Buku')
@section('subtitle', 'Informasi lengkap satu buku')
 
@section('content')
  <div class="text-start">
    <h4 class="mb-3">{{ $buku->judul }}</h4>
 
    <table class="table table-borderless" style="max-width: 560px;">
      <tr>
        <th style="width: 160px;">Penulis</th>
        <td>{{ $buku->penulis }}</td>
      </tr>
      <tr>
        <th>Penerbit</th>
        <td>{{ $buku->penerbit }}</td>
      </tr>
      <tr>
        <th>Kategori</th>
        <td>{{ $buku->kategori->nama_kategori }}</td>
      </tr>
      <tr>
        <th>Tahun terbit</th>
        <td>{{ $buku->tahun_terbit }}</td>
      </tr>
      <tr>
        <th>Stok</th>
        <td>{{ $buku->stok }}</td>
      </tr>
      <tr>
        <th>Status</th>
        <td>
          @if ($buku->stok > 0)
            <span class="badge-table success">Tersedia</span>
          @else
            <span class="badge-table failed">Habis</span>
          @endif
        </td>
      </tr>
    </table>
 
    <div class="d-flex gap-2">
      <a href="{{ route('admin.buku.edit', $buku) }}" class="btn-custom btn-custom-warning">
        <i class="bi bi-pencil"></i> Edit
      </a>
      <a href="{{ route('admin.buku.index') }}" class="btn-custom btn-custom-secondary">
        Kembali
      </a>
    </div>
  </div>
@endsection

