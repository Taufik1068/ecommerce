<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemasok;
use App\Models\Produkpemasok;
use App\Models\Produk;
use App\User;
use Auth;
use Session;


class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mengambil data dari tabel pemasok
        $data = Pemasok::where('id_user', Auth::id())->get();

        //mengirim data pemasok ke view index
        return view('admin.pemasok.datapemasok.index',compact('data'));
    }

    public function laporan()
    {
        $data = Pemasok::where('id_user', Auth::id())->get();
        return view('admin.pemasok.datapemasok.laporan',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemasok.datapemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Pemasok::create($request->all());
        
        return redirect('admin/pemasok/datapemasok') -> with('sukses', 'Data Pemasok Berhasil Ditambah!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pemasok)
    {
        //Mengambil data dari tabel pemasok
        $data1 = Produkpemasok::where('id_pemasok', $id_pemasok)->get();
        $data2 = Pemasok::where('id_pemasok', $id_pemasok)->first();
        $kode = $data2->kode_pemasok;
        $telp = $data2->telp_pemasok;
        //mengirim data pemasok ke view index
        return view('admin.pemasok.datapemasok.show',compact('data1', 'kode', 'telp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pemasok)
    {
        $data = Pemasok::find($id_pemasok);
        return view('admin.pemasok.datapemasok.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id_pemasok, Request $request)
    {
        $request->validate([
            'nama_pemasok' => 'required',
            'id_user' => 'required',
            'kode_pemasok' => 'required',
            'telp_pemasok' => 'required',
            'alamat_pemasok' => 'required',
        ]);
        
        $data = Pemasok::find($id_pemasok);
        $data->nama_pemasok = $request->nama_pemasok;
        $data->id_user = $request->id_user;
        $data->kode_pemasok = $request->kode_pemasok;
        $data->telp_pemasok = $request->telp_pemasok;
        $data->alamat_pemasok = $request->alamat_pemasok;
        $data->save();
  
        return redirect('admin/pemasok/datapemasok') -> with('success', 'Data Pemasok Berhasil Diperbaharui!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pemasok)
    {
        $data = Pemasok::find($id_pemasok);
	    $data->delete();
	    return redirect('admin/pemasok/datapemasok')->with('sukses', 'Data Pemasok Telah diHapus!');
    }


    
}
