@extends('layouts.customer')

@section('title', $search)

@push('nav')
    <nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
        <div class="container">

            <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
                <i class="bx bx-menu icon-single"></i>
            </button>

            <a class="navbar-brand" href="{{route('customer.index')}}">
                <h4 class="font-weight-bold">websiteKU</h4>
            </a>


            <div class="collapse navbar-collapse">
                <form class="form-inline my-2 my-lg-0 mx-auto" action="{{route('customer.searchAllProduk')}}" method="GET">
                    
                    <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search" name="q">
                    <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="bx bx-search"></i></button>
                </form>

            </div>

        </div>
    </nav>

    <nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item {{ request()->is('customer') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('customer.index')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="search-bar d-block d-md-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="form-inline mb-3 mx-auto">
                        <input class="form-control" type="search" placeholder="Search for products..."
                            aria-label="Search">
                        <button class="btn btn-success" type="submit"><i class="bx bx-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-2 text-left">
                        <button type="button" id="sidebarCollapseX" class="btn btn-link">
                            <i class="bx bx-x icon-single"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <ul class="list-unstyled components links">
            <li class="{{ request()->is('customer') ? 'active' : '' }}">
                <a href="{{route('customer.index')}}"><i class="bx bx-home mr-3"></i> Home</a>
            </li>
        </ul>

    </nav>
@endpush

@section('content')
<h6 class="mt-3">"{{$search}}" Ditemukan Sebanyakan "{{$p->count()}}" di Toko Semua Toko</h6>
<hr>

<div class="row">
    @forelse ($p as $produk)
    <div class="col-lg-3 col-6">
        <a href="{{route('produk.detail', ['id_toko' => $produk->toko->id_toko, 'id_produk' => $produk->id_produk])}}" style="text-decoration: none">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('assets/images/'. $produk->gambar_produk)}}" class="img-fluid">
                    <h6>{{$produk->nama_produk}}</h6>
                    <p style="color: black">Rp. {{number_format($produk->harga_produk,0,',','.')}}</p>
                </div>
            </div>
        </a>
    </div>
    @empty
    <div class="col-lg-12">
        <h6>Product Tidak Ditemukan</h6>
    </div>
    @endforelse
</div>

@endsection
