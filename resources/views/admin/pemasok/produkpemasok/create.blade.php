@extends('dashboard.layout')

@section('content')
        <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/home')}}">Beranda</a></div>
              <div class="breadcrumb-item">Pemasok</div>
              <div class="breadcrumb-item"><a href="{{url('admin/pemasok/produkpemasok')}}">Produk Masuk</a></div>
              <div class="breadcrumb-item">Tambah Produk Masuk</div>
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
                        <div class="card-header">
                            <h4>Tambah Produk Pemasok</h4>
                        </div>
                            {!!csrf_field()!!} 
                            
                            <div class="card-body">
                                <form method="POST" action="{{url('admin\pemasok\produkpemasok\create')}}">
                                    @csrf
                                        <div class="row"> 
                                        <input name="id_user" type="hidden" class="form-control" value="{{Auth::id()}}" required="required" readonly>
   
                                            <div class="col-sm-6">
                                                <div class="form-group {{ $errors->has('id_pemasok') ? 'has-error' : '' }}">                                            
                                                    <label for="id_pemasok">Pemasok</label>
                                                        <select class="form-control select2 {{ $errors->has('id_pemasok') ? 'is-invalid' : '' }}" name="id_pemasok" id="id_pemasok" required>                                                
                                                            <option value disabled {{ old('id_pemasok', null) === null ? 'selected' : '' }}></option>
                                                            @foreach($pemasok_select as $key => $label)
                                                                <option value="{{ $key }}" {{ old('id_pemasok', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                            @endforeach
                                                        </select>
                                                               
                                                            @if($errors->has('id_pemasok'))
                                                                <p class="help-block">
                                                                    {{ $errors->first('id_pemasok') }}
                                                                </p>
                                                            @endif
                                                 </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="nama_produk">Nama Produk</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-archive"></i>
                                                                </div>
                                                            </div>
                                                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required="require">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="jumlah_beli">Jumlah Beli</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-code"></i>
                                                                </div>
                                                            </div>
                                                                <input type="text" class="form-control" id="jumlah_beli" name="jumlah_beli" required="require">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="harga_satuan">Harga Satuan</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    Rp.
                                                                </div>
                                                            </div>
                                                                <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" required="require">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="total_pembayaran">Total Pembayaran</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    Rp.
                                                                </div>
                                                            </div>
                                                                <input type="text" class="form-control" id="total_pembayaran" name="total_pembayaran" required="require">
                                                        </div>
                                                </div>
                                            </div>
                                         
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="tanggal_beli">Tanggal Beli</label>
                                                        <div class="input-group">
                                                                <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" required="require">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" name="send" id="send" value="Simpan" class="btn btn-success ml-3">                      
                                            </div>

                                        </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

@stop