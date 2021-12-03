@extends('dashboard.layout')

@section('content')
  <div class="section-header">
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item">Beranda</div>
    </div>
  </div>
  
    


  <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Card Header</h4>
                  </div>
                  <div class="card-body">
                    <p>Card <code>.card-primary</code></p>
                  </div>
                </div>
              </div>

  <div class="row ">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-file-invoice"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pesanan</h4>
          </div>
          <div class="card-body">
            10
          </div>
        </div>
     </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-truck"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pemasok</h4>
          </div>
          <div class="card-body">
            {{$total_pemasok}}
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-info">
          <i class="fas fa-archive"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Produk</h4>
          </div>
          <div class="card-body">
            {{$total_produk}}
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Produk Terjual</h4>
          </div>
          <div class="card-body">
          {{$total_pesanan}}
          </div>
        </div>
      </div>
    </div>

<<<<<<< HEAD
    
=======
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pendapatan</h4>
          </div>
          <div class="card-body">
            10
          </div>
        </div>
      </div>
    </div>    

   
>>>>>>> 05da791272db07d849acc66319b8e9606090b1b1
      

  </div>

@endsection
