@extends('dashboard.layout')

@section('content')
        <div class="section-header">
        <h4>Ubah Data Produk</h4>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/home">Beranda</a></div>
              <div class="breadcrumb-item"><a href="{{ url('admin\penjualan\produk') }}">Produk</a></div>
              <div class="breadcrumb-item">Ubah Data Produk</div>
            </div>
        </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Error!</strong>Terjadi Kesalahan Saat Memasukkan data<br><br>
                                              <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <div class="card-body">
                            <form method="POST" action="/admin/penjualan/produk/update/{{$data->id_produk}}" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT')}}
                                <div class="row">

                                <input name="id_user" type="hidden" class="form-control" value="{{Auth::id()}}" required="required" readonly>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nama_produk">Nama Produk</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-archive"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $data->nama_produk }}" aria-describedby="nama_produk" required="require" placeholder ="Masukkan Nama Produk">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('id_kategori') ? 'has-error' : '' }}">                                            
                                            <label for="id_kategori">Kategori</label>
                                            <select class="form-control select2 {{ $errors->has('id_kategori') ? 'is-invalid' : '' }}" name="id_kategori" id="id_kategori"  required>                                                
                                                
                                            <option value disabled {{ old('id_kategori', null) === null ? 'selected' : '' }}></option>
                                                @foreach($kategori_select as $key => $label)
                                                <option value="{{ $key }}" {{ old('id_kategori', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                @endforeach
                                            </select>
                                                               
                                            @if($errors->has('id_kategori'))
                                                <p class="help-block">
                                            {{ $errors->first('id_kategori') }}
                                                </p>
                                            @endif
                                            </div>
                                            </div>
                                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="gambar_produk">Gambar Produk</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-upload"></i>
                                                    </div>
                                                </div>
                                                    <input type="file" class="form-control" id="gambar_produk" name="gambar_produk" value="{{ $data->gambar_produk }}" aria-describedby="gambar_produk" placeholder ="Masukkan Gambar Produk" required="require">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="sku_produk">Kode Produk</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-pencil-ruler"></i>
                                                    </div>
                                                </div>
                                                    <input type="text" class="form-control" id="sku_produk" name="sku_produk" value="{{ $data->sku_produk }}" aria-describedby="sku_produk" placeholder ="Masukkan Kode Produk" required="require">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-archive"></i>
                                                    </div>
                                                </div>
                                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $data->slug }}" aria-describedby="slug" required="require" placeholder ="Masukkan Nama Slug">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="harga_produk">Harga (Rp.)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-money-bill-wave"></i>
                                                    </div>
                                                </div>
                                                    <input type="text" class="form-control" id="harga_produk" name="harga_produk" value="{{ $data->harga_produk }}" aria-describedby="harga_produk" required="require" placeholder ="Masukkan Harga Produk">
                                            </div>
                                    </div>
                                </div>
                                         
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="stok_produk">Stok</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-database"></i>
                                                    </div>
                                                </div>
                                                    <input type="text" class="form-control" id="stok_produk" name="stok_produk" value="{{ $data->stok_produk }}" aria-describedby="stok_produk" required="require" placeholder ="Masukkan Stok Produk">
                                            </div>
                                    </div>
                                </div>
                                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="deskripsi_produk">Deskripsi</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-clipboard"></i>
                                                    </div>
                                                </div>
                                                    <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" value="{{ $data->deskripsi_produk }}" aria-describedby="deskripsi_produk" required="require" placeholder ="Masukkan Deskripsi Produk">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="panjang_produk">Panjang Produk (cm)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-ruler"></i>
                                                    </div>
                                                </div>
                                                    <input type="text" class="form-control" id="panjang_produk" name="panjang_produk" value="{{ $data->panjang_produk }}" aria-describedby="panjang_produk" required="require" placeholder ="Masukkan Panjang Produk">
                                            </div>
                                    </div>
                                </div>  
                                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lebar_produk">Lebar Produk (cm)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-ruler"></i>
                                                    </div>
                                                </div>
                                                    <input type="text" class="form-control" id="lebar_produk" name="lebar_produk" value="{{ $data->lebar_produk }}" aria-describedby="lebar_produk" required="require" placeholder ="Masukkan Lebar Produk">
                                            </div>
                                    </div>
                                </div>
                                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="tinggi_produk">Tinggi Produk (cm)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-ruler"></i>
                                                    </div>
                                                </div>
                                                    <input type="text" class="form-control" id="tinggi_produk" name="tinggi_produk" value="{{ $data->tinggi_produk }}" aria-describedby="tinggi_produk" required="require" placeholder ="Masukkan Tinggi Produk">
                                            </div>
                                    </div>
                                </div>
                                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="berat_produk">Berat Produk (gram)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-balance-scale"></i>
                                                    </div>
                                                </div>
                                                    <input type="text" class="form-control" id="berat_produk" name="berat_produk" value="{{ $data->berat_produk }}" aria-describedby="berat_produk" required="require" placeholder ="Masukkan Berat Produk">
                                            </div>
                                    </div>
                                </div>

                                <input name="status" type="hidden" class="form-control" id="status" value="tersedia" aria-describedby="status" required="required" readonly>

                                    
                                <div class="text-right">
                                    <a class="btn btn-danger ml-3" href="{{ url('admin\penjualan\produk') }}" onclick="return confirm('Yakin ingin kembali? Perubahan yang dilakukan tidak akan disimpan!')">Kembali</a>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="send" id="send" value="Simpan" class="btn btn-success ml-3" onclick="return confirm('Yakin ingin merubah data produk?')">                      
                                </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

@stop


