<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Namatoko;
use App\User;
use Auth;

class NamatokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Namatoko::where('id_user', Auth::id())->get();
        return view ('namatoko', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('namatoko');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_toko' => 'required',
            'nama_toko' => 'required',
            'alamat_toko' => 'required',
            'telp_toko' => 'required',
            'avatar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'website' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'bio' => 'required'
        ]);
 
        // menyimpan data file yang diupload ke variabel $file
        $avatar = $request->file('avatar');
 
        $nama_file = time()."_".$avatar->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'avatar';
        $avatar->move($tujuan_upload,$nama_file);

        
        Namatoko::create([
            'avatar' => $nama_file,
            'id_toko' => $request->id_toko,
            'nama_toko' => $request->nama_toko,
            'alamat_toko' => $request->alamat_toko,
            'telp_toko' => $request->telp_toko,
            'website' => $request->website,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'bio' => $request->bio
            
        ]);

        return redirect('/namatoko'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_toko)
    {
        
        $data= Namatoko::find($id_toko)->first();
        return view('namatoko', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_toko)
    {
        $this->validate($request, [
            'id_toko' => 'required',
            'nama_toko' => 'required',
            'alamat_toko' => 'required',
            'telp_toko' => 'required',
            'avatar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'website' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'bio' => 'required'

        ]);
 
        // menyimpan data file yang diupload ke variabel $file
        $avatar = $request->file('avatar');
 
        $nama_file = time()."_".$avatar->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'avatar';
        $avatar->move($tujuan_upload,$nama_file);

        
        // update data books
        $data = Namatoko::find($id_toko);
        $data->avatar = $nama_file;
        $data->id_toko = $request->id_toko;
        $data->nama_toko = $request->nama_toko;
        $data->alamat_toko = $request->alamat_toko;
        $data->telp_toko = $request->telp_toko;
        $data->website = $request->website;
        $data->instagram = $request->instagram;
        $data->facebook = $request->facebook;
        $data->bio = $request->bio;

        $data->save();

        return redirect('/namatoko'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_toko)
    {
        $data = Namatoko::find($id_toko);
	    $data->delete();

        return redirect('/namatoko');
    }
}
