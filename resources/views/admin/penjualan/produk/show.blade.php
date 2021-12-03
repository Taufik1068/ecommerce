@extends('dashboard.layout')

@section('content')

<div class="section-header">
<h4>Detail Produk</h4>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home')}}">Beranda</a></div>
                <div class="breadcrumb-item"><a href="{{ url('\admin\penjualan\produk')}}">Produk</a></div>
                <div class="breadcrumb-item">Detail Produk</div>
            </div>
          </div> 

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    
                    <div class="pull-right">
                        <a class="btn btn-info" href="{{ url('admin\penjualan\produk') }}"> Kembali</a>
                    </div>
                  </div>
                  @if(!empty($data1) && $data1->count())  
                  @foreach($data1 as $key => $value)
                  
                        <div class="card-body">
                          <div class="media">
                            <img class="mr-3" src="{{ url('/gambar_produk/'.$value->gambar_produk) }}" width="350" alt="Generic placeholder image">
                            
                              <div class="media-body">
                                <h4 class="text">
                                  {{ $value->nama_produk }}
                                </h4>

                                <b>Kategori</b>&nbsp;&nbsp;
                                <b>: &nbsp; {{ $value->Kategori->nama_kategori }}</b>
                                </br>
                                </br>

                                <b>Deskripsi Produk :</b>
                                <p>{{ $value->deskripsi_produk }}</p>

                                <b>Ukuran Produk</b>
                                </br>

                                <h10>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Panjang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $value->panjang_produk }} cm<h10>
                                </br>
                                <h10>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lebar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $value->lebar_produk }} cm</h10>
                                </br>
                                <h10>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tinggi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $value->tinggi_produk }} cm<h10>
                                </br>
                                <h10>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Berat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $value->berat_produk }} gram<h10>
                              </div>
                          </div>
                        </div>
                      

                  @endforeach
                    @else
                      <tr>
                        <td colspan="5"> Data Tidak Ada </td>
                      </tr>
                    @endif
                      </div>
                    
                </div>
              </div>
            </div>
                      

@stop