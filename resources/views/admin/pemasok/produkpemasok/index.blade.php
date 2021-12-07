@extends('dashboard.layout')

@section('content')
          <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home')}}">Beranda</a></div>
                <div class="breadcrumb-item">Pemasok</div>
                <div class="breadcrumb-item">Produk Masuk</div>
            </div>
          </div>

          <div class="row">
              <div class="col-12">
              @include('dashboard.flash')
                <div class="card">
                  <div class="card-header">
                    <h4>Produk Masuk</h4>
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
                              <th>Nama Pemasok</th>
                              <th>Nama Produk</th>
                              <th>Jumlah Beli</th>
                              <th>Tanggal Beli</th>
                              <th>Harga Persatuan</th>
                              <th>Total Pembayaran</th>
                              <th>Tindakan</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($data as $key => $value)
                            <tr>
                              <td class="text-center">{{$loop->iteration}}</td>
                              <td>{{ $value->Pemasok->nama_pemasok }}</td>
                              <td>{{ $value->nama_produk }}</td>
                              <td>{{ $value->jumlah_beli }} Buah</td>
                              <td>{{ date('d-M-y' , strtotime($value->tanggal_beli)) }}</td>
                              <td>Rp. {{ $value->harga_satuan }}</td>
                              <td>Rp. {{ $value->total_pembayaran }}</td>
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
                            <th class="text-center">
                                #
                              </th>
                              <th>Nama Pemasok</th>
                              <th>Nama Produk</th>
                              <th>Jumlah Beli</th>
                              <th>Tanggal Beli</th>
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
          