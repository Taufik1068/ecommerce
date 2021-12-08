@extends('dashboard.layout')

@section('content')
        <div class="section-header">
        <h4>Tambah Data Kategori Produk</h4>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/home">Beranda</a></div>
              <div class="breadcrumb-item"><a href="/admin/penjualan/kategori">Kategori</a></div>
              <div class="breadcrumb-item">Tambah Kategori Produk</div>
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
                            <form method="POST" action="{{url('admin\penjualan\kategori\store')}}" enctype="multipart/form-data">
                                @csrf
                                
                                <input name="id_user" type="hidden" class="form-control" value="{{Auth::id()}}" required="required" readonly>
                                    
                                    
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama_kategori">Nama Kategori</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-bookmark"></i>
                                                                </div>
                                                            </div>
                                                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required="require" placeholder ="Masukkan Nama Kategori">
                                                        </div>
                                                </div>
                                            </div>
                                         
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="deskripsi_kategori">Deskripsi</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-clipboard"></i>
                                                                </div>
                                                            </div>
                                                                <input type="text" class="form-control" id="deskripsi_kategori" name="deskripsi_kategori" required="require" placeholder ="Masukkan Deskripsi Kategori">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <a class="btn btn-danger ml-3" href="{{ url('admin\penjualan\kategori') }}" onclick="return confirm('Kembali ke halaman kategori produk?')">Kembali</a>
                                                <input type="submit" name="send" id="send" value="Simpan" class="btn btn-success ml-3" onclick="return confirm('Yakin ingin menambah kategori?')">                      
                                            </div>

                                        </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

@stop