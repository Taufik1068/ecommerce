<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\User;
use Auth;
use Session;
use Str;

class KategoriController extends Controller
{
    public function index()
    {
        // mengambil data dari table books
        $data = Kategori::where('id_user', Auth::id())->get();
        // mengirim data books ke view books


        return view('admin.penjualan.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('admin.penjualan.kategori.create');
    }


    public function store(Request $request)
    {
        // Kategori::create($request->all());

        // Update Category
        Kategori::create([
            'id_user' => auth()->user()->id,
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
            'deskripsi_kategori' => $request->deskripsi_kategori,
        ]);

        return redirect('admin/penjualan/kategori')->with('sukses', 'Kategori Berhasil di Tambahkan');
    }


    public function show($id_kategori)
    {
        //Mengambil data dari tabel produk
        $data1 = Kategori::where('id_kategori', $id_kategori)->get();
        $data2 = Kategori::where('id_kategori', $id_kategori)->first();
        $nama_kategori = $data2->nama_kategori;
        $nama_produk = $data2->nama_produk;
        //mengirim data produk ke view index
        return view('admin.penjualan.kategori.show', compact('data1', 'nama_produk'));
    }


    public function edit($id_kategori)
    {
        $data = Kategori::find($id_kategori);
        return view('admin.penjualan.kategori.edit', ['data' => $data]);
    }

    public function update($id_kategori, Request $request)
    {
        // untuk validasi form
        $this->validate($request, [
            'nama_kategori' => 'required',
            'id_user' => 'required',
            'deskripsi_kategori' => 'required'
        ]);

        // update data books
        $data = Kategori::find($id_kategori);
        $data->nama_kategori = $request->nama_kategori;
        $data->id_user = auth()->user()->id;
        $data->slug = Str::slug($request->nama_kategori);
        $data->deskripsi_kategori = $request->deskripsi_kategori;

        $data->save();

        // alihkan halaman edit ke halaman books
        return redirect('admin/penjualan/kategori')->with('sukses', 'Kategori Berhasil di Perbarui');
    }


    public function destroy($id_kategori)
    {
        $data = Kategori::find($id_kategori);
        $data->delete();
        return redirect('admin/penjualan/kategori')->with('sukses', 'Kategori Berhasil di Hapus');
    }
}
