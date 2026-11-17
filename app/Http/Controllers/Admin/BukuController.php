<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
 
class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')->orderBy('judul')->get();
 
        return view('admin.data-buku', compact('buku'));
    }
 
    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();
        $buku = new Buku();
    
        return view('admin.buku.create', compact('kategori', 'buku'));
    }

 
    public function store(Request $request)
    {
        $data = $this->validasi($request);
    
        Buku::create($data);
    
        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }
    
    /**
     * Aturan validasi yang dipakai bersama oleh store() dan update().
     */
    private function validasi(Request $request): array
    {
        return $request->validate([
            'kategori_id'  => 'required|exists:kategori,id',
            'judul'        => 'required|string|max:150',
            'penulis'      => 'required|string|max:100',
            'penerbit'     => 'required|string|max:100',
            'tahun_terbit' => 'required|integer|min:1901|max:' . date('Y'),
            'stok'         => 'required|integer|min:0',
        ], [
            'required' => ':attribute wajib diisi.',
            'string'   => ':attribute harus berupa teks.',
            'integer'  => ':attribute harus berupa angka bulat.',
            'max'      => ':attribute melebihi batas yang diizinkan.',
            'min'      => ':attribute kurang dari batas yang diizinkan.',
            'exists'   => 'Kategori yang dipilih tidak valid.',
        ], [
            'kategori_id'  => 'Kategori',
            'judul'        => 'Judul',
            'penulis'      => 'Penulis',
            'penerbit'     => 'Penerbit',
            'tahun_terbit' => 'Tahun terbit',
            'stok'         => 'Stok',
        ]);
    }


   public function show(Buku $buku)
    {
        return view('admin.buku.show', compact('buku'));
    }

 
    public function edit(Buku $buku)
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();
    
        return view('admin.buku.edit', compact('buku', 'kategori'));
    }

 
    public function update(Request $request, Buku $buku)
    {
        $data = $this->validasi($request);
    
        $buku->update($data);
    
        return redirect()->route('admin.buku.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

 
    public function destroy(Buku $buku)
    {
        $buku->delete();
    
        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku "' . $buku->judul . '" berhasil dihapus.');
    }

}

