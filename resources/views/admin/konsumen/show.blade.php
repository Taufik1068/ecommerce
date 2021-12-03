@extends('dashboard.layout')

@section('content')
          <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home')}}">Beranda</a></div>
                <div class="breadcrumb-item">Konsumen</div>
                <div class="breadcrumb-item"><a href="{{ url('\admin\konsumen')}}">Data Konsumen</a></div>
                <div class="breadcrumb-item">Detail Konsumen</div>
            </div>
          </div> 

          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Detail Konsumen </h4>
                  </div>
                  
                  <div class="card-body">
                      <div class="row">
                        <div class="col-xs-12">
                          <table class="table">
                            <tbody>
                              <tr>
                                <th>Kode Transaksi</th>
                                <th>:</th>
                                <th>{{ $data1->kode_pembayaran}}</th>
                              </tr>

                              <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th>{{$data1->nama_pembeli}}</th>

                                <th>Email</th>
                                <th>:</th>
                                <th>{{$data1->email_pembeli}}</th>
                              </tr>

                              <tr>
                                <th>No Handphone</th>
                                <th>:</th>
                                <th>{{$data1->telp_pembeli}}</th>

                                <th>Total Harga Barang</th>
                                <th>:</th>
                                <th>Rp.  </th>
                              </tr>

                              <tr>
                                <th>Alamat</th>
                                <th>:</th>
                                <th>{{$data1->alamat_pembeli}}</th>

                                <th>Harga Pengiriman</th>
                                <th>:</th>
                                <th>Rp. {{$data->harga_pengiriman}}</th>
                              </tr>

                              <tr>
                                <th>Jenis Pembayaran </th>
                                <th>:</th>
                                <th>{{$data1->jenis_pembayaran}}</th>

                                <th>Total Bayar</th>
                                <th>:</th>
                                <th>Rp. {{$data->total_pembayaran}}</th>
                              </tr>

                              <tr>
                                <th>Jenis Pengiriman</th>
                                <th>:</th>
                                <th>{{$data1->jenis_pengiriman}}</th>

                                <th>Status</th>
                                <th>:</th>
                                <th>
                                  <span class= "badge- {{ ($data->status == 'Selesai') ? 'badge-primary' : 'badge-warning'}}">{{$data->status}}</span>
                                </th>
                              </tr>

                              <tr>
                                <th>Pesanan</th>
                                <th>:</th>
                                <th>{{$data1->Produk1->nama_produk}} - {{$data1->jumlah1}} Buah
                                    </br>
                                    {{$data1->Produk2->nama_produk}} - {{$data1->jumlah2}} Buah
                                    </br>
                                    {{$data1->Produk3->nama_produk}} - {{$data1->jumlah3}} Buah
                                    </br>
                                    {{$data1->Produk4->nama_produk}} - {{$data1->jumlah4}} Buah
                                    </br>
                                    {{$data1->Produk5->nama_produk}} - {{$data1->jumlah5}} Buah
                                    </br>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
                
              </div>
          </div>



@stop
          