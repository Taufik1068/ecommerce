<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produkpemasok;
use App\Models\Kategori;
use App\Models\Pemasok;
use App\Namatoko;
use App\User;
use Auth;
use Session;

class ProdukpemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produkpemasok::where('id_user', Auth::id())->get();
        
        return view('admin.pemasok.produkpemasok.index',compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporanpemasok()
    {
        return view('admin.pemasok.produkpemasok.laporanpemasok');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak($tglawal, $tglakhir)
    {
        //dd("Tanggal Awal : ".$tglawal,"Tanggal Akhir : ".$tglakhir);
        $data2 = Namatoko::where('id_user', Auth::id())->first();
        $data = Produkpemasok::where('id_user', Auth::id())->whereBetween('tanggal_beli',[$tglawal, $tglakhir]);
        return view('admin.pemasok.produkpemasok.cetak', compact ('data', 'tglawal', 'tglakhir', 'data2'));
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasok_select = Pemasok::where('id_user', Auth::id())->pluck('nama_pemasok','id_pemasok');
        
        
        return view('admin.pemasok.produkpemasok.create', compact('pemasok_select'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Produkpemasok::create($request->all());
        $data = Produkpemasok::where('id_user', Auth::id());
        return redirect('admin/pemasok/produkpemasok') -> with('sukses', 'Data Produk Pemasok Berhasil Ditambah!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.pemasok.produkpemasok.laporanpemasok');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_produk_pemasok)
    {
        $data = Produkpemasok::find($id_produk_pemasok);
	    $data->delete();
	    return redirect('admin/pemasok/produkpemasok')->with('sukses', 'Data Produk Masuk Telah dihapus!');
    }

}
