@extends('dashboard.layout')

@section('content')
        <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('beranda')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Konsumen</div>
              <div class="breadcrumb-item"><a href="{{ url('admin/konsumen')}}">Data Konsumen</a></div>
              <div class="breadcrumb-item">Perbarui Data</div>
            </div>
        </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                            <div class="card-header">
                                <h4>Perbarui Data Konsumen</h4>
                            </div>
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
                            <form method="POST" action="/admin/konsumen/update/{{$data->id_pembayaran }}" >
                                @csrf
                                {{ method_field('PUT')}}
                                <div class="row">  

                                  

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="harga_pengiriman">Harga Pengiriman</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="harga_pengiriman" id="harga_pengiriman" value="{{$data->harga_pengiriman}}" aria-describedby="harga_pengiriman">
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
                                                    <input type="text" class="form-control" name="total_pembayaran" id="total_pembayaran" aria-describedby="total_pembayaran" value = "{{$data->total_pembayaran}}">
                                                </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-right">
                                        <a class="btn btn-danger ml-3" href="{{ url('admin\pemasok\datapemasok') }}">Kembali</a>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="send" id="send" value="Simpan" class="btn btn-success ml-3">                      
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

@stop