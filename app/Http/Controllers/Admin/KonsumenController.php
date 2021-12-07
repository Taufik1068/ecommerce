<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pembayaran;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Namatoko;
use App\User;
use Auth;
use Session;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembayaran::where('id_user', Auth::id())->get();
        $data1 = Pesanan::where('id_user', Auth::id())->get();
        return view('admin.konsumen.index', compact('data','data1'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pesanan)
    {
        
        $data = Pembayaran::find($id_pesanan)->first();
        $data1 = Pesanan::find($id_pesanan)->first();
        
        return view('admin.konsumen.show',compact('data','data1'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pembayaran)
    {
        
        $data = Pembayaran::where('id_pembayaran', $id_pembayaran)->first();
        return view('admin.konsumen.edit',compact('data'));
    }
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id_pembayaran, Request $request)
    {
        $this->validate($request, [
            'tanggal_pengiriman' => 'required',
            'harga_pengiriman' => 'required',
            'total_pembayaran' => 'required',
            ]);
            
        
            $data = Pembayaran::find($id_pembayaran);
            $data->harga_pengiriman = $request->harga_pengiriman;
            $data->tanggal_pengiriman = $request->tanggal_pengiriman;
            $data->total_pembayaran = $request->total_pembayaran;
            $data->save();
            return redirect('admin/konsumen') -> with('sukses', 'Data Berhasil Diperbaharui!');
            
        }
        
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporankonsumen()
    {
        return view('admin.konsumen.laporan');
    }
    
    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function cetak($tglawal, $tglakhir)
        {
            //dd("Tanggal Awal : ".$tglawal,"Tanggal Akhir : ".$tglakhir);
            $data2 = Namatoko::all()->first();
            $data1 = Pesanan::all();
            $data = Pembayaran::all()->whereBetween('created_at',[$tglawal, $tglakhir]);
            return view('admin.konsumen.cetak', compact ('data', 'tglawal', 'tglakhir','data2','data1'));
            
        }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
