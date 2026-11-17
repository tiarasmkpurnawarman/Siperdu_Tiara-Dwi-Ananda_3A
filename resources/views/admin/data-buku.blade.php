@extends('layout.admin')
 
@section('title', 'Data Buku')
@section('subtitle', 'Data-data buku yang tersedia di perpustakaan')
 
@section('content')
  @include('admin.buku._alert')
 
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.buku.create') }}" class="btn-custom btn-custom-primary">
      <i class="bi bi-plus-lg"></i> Tambah Buku
    </a>
  </div>
 
  <div class="table-card-custom">
    <div class="table-responsive">
      <table class="table-custom">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Kategori</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($buku as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td class="table-product-name">{{ $item->judul }}</td>
              <td>{{ $item->penulis }}</td>
              <td>{{ $item->kategori->nama_kategori }}</td>
              <td>{{ $item->tahun_terbit }}</td>
              <td>{{ $item->stok }}</td>
              <td>
                @if ($item->stok > 0)
                  <span class="badge-table success">Tersedia</span>
                @else
                  <span class="badge-table failed">Habis</span>
                @endif
              </td>
              <td>
                <div class="d-flex justify-content-center gap-2">
                  <a href="{{ route('admin.buku.show', $item) }}"
                     class="btn-custom btn-custom-primary btn-custom-sm">
                    <i class="bi bi-eye"></i> Detail
                  </a>
                  <a href="{{ route('admin.buku.edit', $item) }}"
                     class="btn-custom btn-custom-warning btn-custom-sm">
                    <i class="bi bi-pencil"></i> Edit
                  </a>
                  <form action="{{ route('admin.buku.destroy', $item) }}" method="POST"
                        onsubmit="return confirm('Hapus buku ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-custom btn-custom-danger btn-custom-sm">
                      <i class="bi bi-trash"></i> Hapus
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" class="text-center">Belum ada data buku.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection

