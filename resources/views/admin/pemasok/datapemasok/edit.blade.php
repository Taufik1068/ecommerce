@extends('dashboard.layout')

@section('content')
        <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('beranda')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Pemasok</div>
              <div class="breadcrumb-item"><a href="{{ url('datapemasok')}}">Data Pemasok</a></div>
              <div class="breadcrumb-item">Ubah Data Pemasok</div>
            </div>
        </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                            <div class="card-header">
                                <h4>Ubah Data Pemasok</h4>
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
                            <form method="POST" action="/admin/pemasok/datapemasok/update/{{$data->id_pemasok }}" >
                                @csrf
                                {{ method_field('PUT')}}
                                <div class="row">  
                                    
                                <input name="id_user" type="hidden" class="form-control" value="{{Auth::id()}}" required="required" readonly>


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kode_pemasok">Kode Pemasok</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-code"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="kode_pemasok" id="kode_pemasok" class="form-control" value="{{ $data->kode_pemasok }}" aria-describedby="kode_pemasok" placeholder ="Masukkan Kode Pemasok">
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama_pemasok">Nama Pemasok</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="nama_pemasok" id="nama_pemasok" value="{{ $data->nama_pemasok }}" aria-describedby="nama_pemasok" placeholder ="Masukkan Nama Pemasok">
                                                </div>
                                        </div>
                                    </div>
                                         
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="telp_pemasok">Nomor Telepon</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="telp_pemasok" id="telp_pemasok" value="{{ $data->telp_pemasok }}" aria-describedby="telp_pemasok" placeholder ="Masukkan Nomor Telpon Pemasok">
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="alamat_pemasok">Alamat Pemasok</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="alamat_pemasok" id="alamat_pemasok" value="{{ $data->alamat_pemasok }}" aria-describedby="alamat_pemasok" placeholder ="Masukkan Alamat Pemasok">
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