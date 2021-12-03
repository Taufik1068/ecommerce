@extends('dashboard.layout')

@section('content')
        <div class="section-header">
        <h4>Tambah Data Produk</h4>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/home">Beranda</a></div>
              <div class="breadcrumb-item"><a href="{{ url('\admin\penjualan\produk')}}">Produk</a></div>
              <div class="breadcrumb-item">Tambah Data Produk</div>
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
                            {!!csrf_field()!!} 
                            
                            <div class="card-body">
                                <form method="POST" action="{{url('admin\penjualan\produk\store')}}" enctype="multipart/form-data">
                                    @csrf
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
                                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required="require" placeholder ="Masukkan Nama Produk">
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has('id_kategori') ? 'has-error' : '' }}">                                            
                                            <label for="id_kategori">Kategori</label>
                                            <select class="form-control select2 {{ $errors->has('id_kategori') ? 'is-invalid' : '' }}" name="id_kategori" id="id_kategori" required>                                                
                                                
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
                                                                <input type="file" class="form-control" id="gambar_produk" name="gambar_produk" placeholder ="Masukkan Gambar Produk" required="require">
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
                                                                <input type="text" class="form-control" id="sku_produk" name="sku_produk" placeholder ="Masukkan Kode Produk" required="require">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="slug">Slug</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-box"></i>
                                                                </div>
                                                            </div>
                                                                <input type="text" class="form-control" id="slug" name="slug" required="require" placeholder ="Masukkan Nama Slug">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group {{ $errors->has('harga_produk') ? 'has-error' : '' }}">
                                                    <label for="harga_produk">Harga (Rp.)</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-money-bill-wave"></i>
                                                                </div>
                                                            </div>
                                                                <input type="number" min="0" class="form-control" id="harga_produk" name="harga_produk" required="require" placeholder ="Masukkan Harga Produk">
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
                                                                <input type="number" min="1" class="form-control" id="stok_produk" name="stok_produk" required="require" placeholder ="Masukkan Stok Produk">
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
                                                                <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" required="require" placeholder ="Masukkan Deskripsi Produk"></textarea>
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
                                                                <input type="number" min="0" class="form-control" id="panjang_produk" name="panjang_produk" required="require" placeholder ="Masukkan Panjang Produk">
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
                                                                <input type="number" min="0" class="form-control" id="lebar_produk" name="lebar_produk" required="require" placeholder ="Masukkan Lebar Produk">
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
                                                                <input type="number" min="0" class="form-control" id="tinggi_produk" name="tinggi_produk" required="require" placeholder ="Masukkan Tinggi Produk">
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
                                                                <input type="number" min="0" class="form-control" id="berat_produk" name="berat_produk" required="require" placeholder ="Masukkan Berat Produk">
                                                        </div>
                                                </div>
                                            </div>

                                            
                                            <input name="status" type="hidden" class="form-control" value="tersedia" required="required" readonly>

                                            <div class="form-group">
                                                <a class="btn btn-danger ml-3" href="{{ url('admin\penjualan\produk') }}" onclick="return confirm('Yakin ingin kembali? Data produk tidak akan disimpan!')">Kembali</a>
                                                <input type="submit" name="send" id="send" value="Simpan" class="btn btn-success ml-3" onclick="return confirm('Konfirmasi penyimpanan data produk')">                      
                                            </div>

                                        </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

            </form>

            
@stop