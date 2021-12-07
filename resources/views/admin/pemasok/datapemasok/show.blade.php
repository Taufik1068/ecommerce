@extends('dashboard.layout')

@section('content')
          <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home')}}">Beranda</a></div>
                <div class="breadcrumb-item">Pemasok</div>
                <div class="breadcrumb-item"><a href="{{ url('\admin\pemasok\datapemasok')}}">Data Pemasok</a></div>
                <div class="breadcrumb-item">Detail Pemasok</div>
            </div>
          </div> 

          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Detail Pemasok</h4>
                    <div class="pull-right">
                        <a class="btn btn-danger" href="{{ url('admin\pemasok\datapemasok') }}">Kembali</a>
                    </div>
                  </div>
                  
                    <div class="card-body">
                       <div class="text ">
                           Kode Pemasok : {{ $kode }}
                       </div>
                       <div class="text mt-3">
                           Nomor Telepon : {{ $telp }}
                       </div>
                        <div class="table-responsive mt-4">
                            <table class="table table-striped" id="table-1">
                            <thead>   
                            @if(!empty($data1) && $data1->count())                              
                                <tr>
                                <th>#</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Beli</th>
                                <th>Harga Persatuan</th>
                                <th>Total Pembayaran</th>
                                <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody> 
                            @foreach($data1 as $key => $value)
                                <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{ $value->tanggal_beli }}</td>
                                <td>{{ $value->nama_produk }}</td>
                                <td>{{ $value->jumlah_beli }}</td>
                                <td>{{ $value->harga_satuan }}</td>
                                <td>{{ $value->total_pembayaran }}</td>
                                <td>
                                <a href="/admin/pemasok/produkpemasok/destroy/{{ $value -> id_produk_pemasok }}" class="fas fa-trash ml-2" onclick="return confirm('Yakin hapus ?')"></a>
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
                                        <th>#</th>
                                        <th>Tanggal Beli</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah Beli</th>
                                        <th>Harga Persatuan</th>
                                        <th>Total Pembayaran</th>
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
          