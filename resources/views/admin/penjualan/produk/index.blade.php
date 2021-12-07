<!DOCTYPE html>
<html lang="en">
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

            <!-- Main Content -->
            <div class="main-content">
            
              <section class="section">

              <div class="section-header">
              <h4>Data Produk</h4>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/home">Beranda</a></div>
              <div class="breadcrumb-item">Produk</div>
            </div>
          </div>
          @include('dashboard.flash')
          <div class="row">
              <div class="col-12">
                <div class="card"> 
                  <div class="card-header">
                    
                    
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ url('admin\penjualan\produk\create') }}">Tambah</a>
                    </div>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                          <thead>   
                        @if(!empty($data) && $data->count())                              
                              <tr>
                                <th class="text-center">
                                  No
                                </th>
                                <th>Nama Kategori</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Slug</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                              </tr>
                          </thead>

                          <tbody>
                          @foreach($data as $value)
                                  <tr data-entry-id="{{ $value->id_produk }}">
                                  <td class="text-center">{{$loop->iteration}}</td>
                                  <td>{{ $value->Kategori->nama_kategori }}</td>
                                  <td>{{ $value->sku_produk }}</td>
                                  <td>{{ $value->nama_produk }}</td>
                                  <td>{{ $value->slug }}</td>
                                  <td>Rp.{{ $value->harga_produk }}</td>
                                  <td class="text-center">{{ $value->stok_produk }}</td>
                                  <td class="text-center">
                                    <label class="article-badge-item {{ ($value->status == 'tersedia') ? 'badge badge-pill badge-success mb-1' : 'badge badge-pill badge-danger mb-1' }}">{{$value->status}}</label>
                                  </td>

                                  <td>
                                    <a href ="/admin/penjualan/produk/show/{{ $value -> id_produk }}"><i class="fas fa-info-circle ml-2 mt-2"></i></a>
                                    <a href = "/admin/penjualan/produk/edit/{{ $value -> id_produk }}" class="fas fa-edit ml-2 mt-2"></a>
                                    <a href ="/admin/penjualan/produk/destroy/{{ $value -> id_produk }}" class="fas fa-trash ml-2 mt-2" id="swal-6"></a>
                                    
                                  </td>
                                </tr>
                                
                                <!-- Modal Verifikasi Hapus produk-->
                                
                                <!-- End Modal Verifikasi Hapus produk-->
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
  <script>
"use strict";

      $("#swal-6").click(function() {
  swal({
      title: 'Apakah Kamu Yakin?',
      text: 'Jika dihapus, Kamu tidak dapat mengembalikan file tersebut!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal('Berhasil! Data telah berhasil dihapus!', {
        icon: 'success',
      });
      } else {
      swal('Data gagal dihapus!');
      }
    });
});
    </script>
</html>

  






         


