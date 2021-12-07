@extends('dashboard.layout')

@section('content')
          <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home')}}">Beranda</a></div>
                <div class="breadcrumb-item">Pemasok</div>
                <div class="breadcrumb-item">Data Pemasok</div>
            </div>
          </div>

          <div class="row">
              <div class="col-12">
              @include('dashboard.flash')
                <div class="card">
                  <div class="card-header">
                    <h4>Data Pemasok</h4>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ url('datapemasok/create') }}">Tambah</a>
                    </div>
                  </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                          <thead>   
                          @if(!empty($data) && $data->count())                              
                            <tr>
                              <th class="text-center">
                                #
                              </th>
                              <th>Kode Pemasok</th>
                              <th>Nama Pemasok</th>
                              <th>Nomor Telpon</th>
                              <th>Alamat</th>
                              <th>Tindakan</th>
                            </tr>
                          </thead>
                          <tbody> 
                          @foreach($data as $key => $value)
                            <tr>
                              <td class="text-center">{{$loop->iteration}}</td>
                              <td>{{ $value->kode_pemasok }}</td>
                              <td>{{ $value->nama_pemasok }}</td>
                              <td>{{ $value->telp_pemasok }}</td>
                              <td>{{ $value->alamat_pemasok }}</td>
                              <td>    
                                    <a href="/admin/pemasok/datapemasok/show/{{ $value -> id_pemasok }}"> <i class="fas fa-info-circle ml-2 mt-2"></i></a>
                                    <a href ="/admin/pemasok/datapemasok/edit/{{ $value -> id_pemasok }}" ><i class="fas fa-edit ml-2 mt-2"></i></a>
                                    <a href="/admin/pemasok/datapemasok/destroy/{{ $value -> id_pemasok }}" class="fas fa-trash ml-2" onclick="return confirm('Yakin hapus ?')"></a>
                              </td>
                            </tr>
                            @endforeach

                              @else
                                <tr>
                                    <td colspan="5"> Data Tidak Ada </td>
                                </tr>
                              @endif
                          </tbody>
                          <tfoot>
                            <tr>
                              <th class="text-center">
                                #
                              </th>
                              <th>Kode Pemasok</th>
                              <th>Nama Pemasok</th>
                              <th>Nomor Telpon</th>
                              <th>Alamat</th>
                              <th>Tindakan</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                </div>
              </div>
          </div>



@stop
          