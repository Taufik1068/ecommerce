@extends('dashboard.layout')

@section('content')
        <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('home')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Pemasok</div>
              <div class="breadcrumb-item"><a href="{{ url('datapemasok')}}">Data Pemasok</a></div>
              <div class="breadcrumb-item">Tambah Data Pemasok</div>
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
                            <h4>Tambah Data Pemasok</h4>
                        </div>
                            {!!csrf_field()!!} 
                            
                            <div class="card-body">
                                <form method="POST" action="{{url('admin\pemasok\datapemasok\create')}}">
                                    @csrf
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
                                                                <input type="text" class="form-control" id="Kode_pemasok" name="kode_pemasok" required="require">
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
                                                                <input type="text" class="form-control" id="nama_pemasok" name="nama_pemasok" required="require">
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
                                                                <input type="text" class="form-control" id="telp_pemasok" name="telp_pemasok" required="require">
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
                                                                <input type="text" class="form-control" id="alamat_pemasok" name="alamat_pemasok" required="require">
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