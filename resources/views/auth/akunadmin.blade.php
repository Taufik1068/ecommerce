@extends('dashboard.layout')

@section('content')

    <div class="section-header">
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
                    <h4>Akun Admin</h4>

                    <div class="pull-right">
                        <a class="btn btn-info" href="{{ url('\home') }}">Kembali</a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                          <thead>   
                        @if(!empty($data) && $data->count())                              
                              <tr>                                
                                <th>Nama Admin</th>
                                <th>E-mail</th>
                                <th>Password</th>
                                <th>Tindakan</th>
                              </tr>
                          </thead>

                          <tbody>
                              @foreach($data as $key => $value)
                                <tr>                                                                 
                                  <td>{{ $value->name }}</td>
                                  <td>{{ $value->email }}</td>
                                  <td>{{ $value->password }}</td>
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