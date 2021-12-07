@extends('dashboard.layout')

@section('content')
          <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home')}}">Beranda</a></div>
                <div class="breadcrumb-item">Pemasok</div>
                <div class="breadcrumb-item">Laporan Pemasok</div>
            </div>
          </div>

          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Laporan Pemasok</h4>
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
                            </tr>
                          </thead>
                          <tbody> 
                          @foreach($data as $key => $value)
                            <tr>
                              <td class="text-center">{{ $key+1 }}</td>
                              <td>{{ $value->kode_pemasok }}</td>
                              <td>{{ $value->nama_pemasok }}</td>
                              <td>{{ $value->telp_pemasok }}</td>
                              <td>{{ $value->alamat_pemasok }}</td>
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
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                </div>
              </div>
          </div>



@stop
          