@extends('dashboard.layout')

@section('content')

    <div class="section-header">
    <h4>Kategori Produk</h4>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/home">Beranda</a></div>
            <div class="breadcrumb-item">Kategori Produk</div>
        </div>
    </div>
    @include('dashboard.flash')
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ url('admin\penjualan\kategori\create') }}">Tambah</a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                          <thead>   
                        @if(!empty($data) && $data->count())                              
                              <tr>                                
                                <th>Nama Kategori</th>
                                <th>Slug</th>
                                <th>Deskripsi</th>
                                <th>Tindakan</th>
                              </tr>
                          </thead>

                          <tbody>
                              @foreach($data as $key => $value)
                                <tr>                                                                 
                                  <td>{{ $value->nama_kategori }}</td>
                                  <td>{{ $value->slug }}</td>
                                  <td>{{ $value->deskripsi_kategori }}</td>
                                  <td class="text-center">
                                    <a href = "/admin/penjualan/kategori/edit/{{ $value -> id_kategori }}" class="fas fa-edit ml-2 mt-2"></a>
                                    
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

@stop