<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Produkpemasok;
use App\User;
use Auth;
use Str;
use Session;


class ProdukController extends Controller
{
    public function index()
    {
        // mengambil data dari table books
        $data = Produk::where('id_user', Auth::id())->get();
        //$data = Produk::where('stok_produk', '<=' , 10)->get();
        // mengirim data books ke view books

        return view('admin.penjualan.produk.index', compact('data'));
    }


    public function create()
    {
        $kategori_select = Kategori::where('id_user', Auth::id())->pluck('nama_kategori', 'id_kategori');
        return view('admin.penjualan.produk.create', compact('kategori_select'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'id_user' => 'required',
            'sku_produk' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'stok_produk' => 'required',
            'gambar_produk' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_produk' => 'required',
            'panjang_produk' => 'required',
            'lebar_produk' => 'required',
            'tinggi_produk' => 'required',
            'berat_produk' => 'required',
            'status' => 'required'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $gambar_produk = $request->file('gambar_produk');

        $nama_file = time() . "_" . $gambar_produk->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'gambar_produk';
        $gambar_produk->move($tujuan_upload, $nama_file);


        Produk::create([
            'gambar_produk' => $nama_file,
            'id_kategori' => $request->id_kategori,
            'id_user' => auth()->user()->id,
            'sku_produk' => $request->sku_produk,
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'panjang_produk' => $request->panjang_produk,
            'lebar_produk' => $request->lebar_produk,
            'tinggi_produk' => $request->tinggi_produk,
            'berat_produk' => $request->berat_produk,

        ]);



        return redirect('admin/penjualan/produk')->with('sukses', 'Data Produk Berhasil di Tambah!');
    }


    public function show($id_produk)
    {
        //Mengambil data dari tabel produk
        $data1 = Produk::where('id_produk', $id_produk)->get();
        $data2 = Produk::where('id_produk', $id_produk)->first();
        $nama_kategori = $data2->nama_kategori;
        $nama_produk = $data2->nama_produk;
        //mengirim data produk ke view index
        return view('admin.penjualan.produk.show', compact('data1', 'nama_produk'));
    }



    public function edit($id_produk)
    {
        $data = Produk::find($id_produk);
        $kategori_select = Kategori::where('id_user', Auth::id())->pluck('nama_kategori', 'id_kategori');

        return view('admin.penjualan.produk.edit', compact('data', 'kategori_select'));
    }


    public function update($id_produk, Request $request)
    {
        // untuk validasi form
        $this->validate($request, [
            'id_kategori' => 'required',
            'id_user' => 'required',
            'sku_produk' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'stok_produk' => 'required',
            'gambar_produk' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_produk' => 'required',
            'panjang_produk' => 'required',
            'lebar_produk' => 'required',
            'tinggi_produk' => 'required',
            'berat_produk' => 'required'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $gambar_produk = $request->file('gambar_produk');

        $nama_file = time() . "_" . $gambar_produk->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'gambar_produk';
        $gambar_produk->move($tujuan_upload, $nama_file);



        // update data books
        $data = Produk::find($id_produk);
        $data->gambar_produk = $nama_file;
        $data->id_kategori = $request->id_kategori;
        $data->id_user = $request->id_user;
        $data->sku_produk = $request->sku_produk;
        $data->nama_produk = $request->nama_produk;
        $data->slug = Str::slug($request->nama_produk);
        $data->harga_produk = $request->harga_produk;
        $data->stok_produk = $request->stok_produk;
        $data->deskripsi_produk = $request->deskripsi_produk;
        $data->panjang_produk = $request->panjang_produk;
        $data->lebar_produk = $request->lebar_produk;
        $data->tinggi_produk = $request->tinggi_produk;
        $data->berat_produk = $request->berat_produk;
        $data->status = $request->status;

        $status_sekarang = $data->stok_produk;
        if ($status_sekarang == 0) {
            $data->status = $request = 'habis';
        } else {
            $data->status = $request = 'tersedia';
        }

        $data->save();

        // alihkan halaman edit ke halaman books
        return redirect('admin/penjualan/produk')->with('sukses', 'Data Produk Berhasil diperbaharui!');
    }


    public function destroy($id_produk)
    {
        $data = Produk::find($id_produk);
        $data->delete();
        return redirect('admin/penjualan/produk')->with('sukses', 'Data Produk Berhasil dihapus!');
    }
}
