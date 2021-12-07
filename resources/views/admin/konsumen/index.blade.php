<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>ADMIN</title>

    @include('dashboard.head')

    <body>
      <div id="app">
        <div class="content-wrapper">
        <div class="main-wrapper main-wrapper-1">
            @include('dashboard.header')

            @include('dashboard.sidebar')

             <!-- Modal Edit !-->
          @foreach($data as $key => $value)
          <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal-{{ $value->id_pembayaran }}">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Perbarui Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/admin/konsumen/update/{{$value->id_pembayaran }}" >
                    @csrf
                    {{ method_field('PUT')}}
                       <div class="row">  
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                                <div class="input-group">
                                  <input type="date" class="form-control" name="tanggal_pengiriman" id="tanggal_pengiriman" aria-describedby="tanggal_pengiriman" value = "{{$value->tanggal_pengiriman}}">
                                </div>
                           </div>
                        </div>
                                  
                                  
                                          <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="harga_pengiriman">Harga Pengiriman</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    Rp.
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="harga_pengiriman" id="harga_pengiriman" value="{{$value->harga_pengiriman}}" aria-describedby="harga_pengiriman">
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
                                                      <input type="text" class="form-control" name="total_pembayaran" id="total_pembayaran" aria-describedby="total_pembayaran" value = "{{$value->total_pembayaran}}">
                                                  </div>
                                          </div>
                                        </div>
                                  </div>
                </form>
                
                <input type="submit" name="send" id="send" value="Simpan" class="btn btn-success ml-3">
              </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach


            <!-- Main Content  -->
            <div class="main-content">
            
              <section class="section">

          <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Konsumen</div>
                <div class="breadcrumb-item">Data Konsumen</div>
            </div>
          </div>

          <div class="row">
              <div class="col-12">
              @include('dashboard.flash')
                <div class="card">
                  <div class="card-header">
                    <h4>Data Konsumen</h4>
                  </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                          <thead>   
                          @if(!empty($data) && $data->count())                              
                            <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">Tanggal Pesanan</th>
                              <th class="text-center">Pesanan</th>
                              <th class="text-center">Nama</th>
                              <th class="text-center">Jenis Pengiriman</th>
                              <th class="text-center">Jenis Pembayaran</th>
                              <th class="text-center">Total Pembayaran</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Tindakan</th>
                            </tr>
                          </thead>
                          <tbody> 
                          @foreach($data as $key => $value)
                            <tr>
                              <td class="text-center">
                              <a href="#" class="btn {{ ($value->status == 'Belum Bayar') ? 'btn-secondary' : ($value->status == 'Dikemas') ? 'btn-info' 
                                : ($value->status == 'Dikirim') ? 'btn-success' :  'btn-primary'}}">
                                {{ ($value->status == 'Belum Bayar') ? 'Dikemas' : ($value->status == 'Dikemas' ) ? 'Dikirim' : 'Selesai' }}
                               </a>
                                  
                              </td>
                              <td class="text-center">{{ date('d M y' , strtotime($value->created_at)) }} </td>
                          @endforeach
                          @foreach($data1 as $key => $value)
                              <td class="text-center">{{ $value->Produk1->nama_produk }} - {{ $value->jumlah1 }} 
                                  </br>
                                  {{ ($value->Produk2->id_produk == '0') ? 'p' : $value->Produk2->nama_produk  }}  
                                  </br>
                              
                              </td>
                          @endforeach
                          @foreach($data as $key => $value)
                              <td class="text-center">{{ $value->Pesanan->nama_pembeli }}</td>
                              <td class="text-center">{{ $value->Pesanan->jenis_pengiriman }}</td>
                              <td class="text-center">{{ $value->Pesanan->jenis_pembayaran }}</td>
                              <td class="text-center">Rp. {{ $value->total_pembayaran }}</td>
                              <td class= "badge {{ ($value->status == 'Selesai') ? 'badge-primary' : 'badge-warning'}}">{{ $value->status }}</td>
                              <td>    
                                    <a href="/admin/konsumen/show/{{ $value -> id_pembayaran }}"> <i class="fas fa-info-circle ml-2 mt-2"></i></a>
                                    <a href ="#" data-toggle="modal" data-target="#exampleModal-{{$value->id_pembayaran}}" ><i class="fas fa-edit ml-2 mt-2"></i></a>
                              </td>
                            </tr>
                            @endforeach

                              @else
                                <tr>
                                    <td colspan="5"> Data Tidak Ada </td>
                                </tr>
                              @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
              </div>
          </div>


         

              </section>
            </div>
            
            
          <footer class="main-footer">
            <div class="footer-right">
              Copyright &copy; 2021
            </div>
          </footer>
        </div>
      </div>
      
          @include('dashboard.footer')

    </body>
  </head>
</html>


          