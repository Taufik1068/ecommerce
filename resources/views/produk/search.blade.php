@extends('layouts.customer')

@section('title', $search)

@push('nav')
    <nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
        <div class="container">

            <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
                <i class="bx bx-menu icon-single"></i>
            </button>

            <a class="navbar-brand" href="{{route('customerToko.show', $n->id_toko)}}">
                <h4 class="font-weight-bold">{{$n->nama_toko}}</h4>
            </a>

            <ul class="navbar-nav ml-auto d-block d-md-none">
                <li class="nav-item">
                    <a class="btn btn-link" href="{{route('cart.index', $n->id_toko)}}"><i class="bx bxs-cart icon-single"></i> <span
                            class="badge badge-danger">{{Cart::instance('cart_'. $n->id_toko)->count()}}</span></a>
                </li>
            </ul>

            <div class="collapse navbar-collapse">
                <form class="form-inline my-2 my-lg-0 mx-auto" action="{{route('customer.searchProduk', $id_toko)}}" method="GET">
                    
                    <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search" name="q">
                    <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="bx bx-search"></i></button>
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-link" href="{{route('cart.index', $n->id_toko)}}"><i class="bx bxs-cart icon-single"></i> <span
                                class="badge badge-danger">{{Cart::instance('cart_'. $n->id_toko)->count()}}</span></a>
                    </li>
                </ul>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (\App\Models\Kategori::where('id_user', $n->id_user)->latest()->get() as $cate)
                            <a class="dropdown-item" href="{{route('category.detail', ['id_toko' => $n->id_toko, 'id_kategori' => $cate->id_kategori])}}">{{$cate->nama_kategori}}</a>
                            @endforeach
                        </div>
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
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="bx bx-help-circle mr-3"></i>
                    Category</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    @foreach (\App\Models\Kategori::where('id_user', $n->id_user)->latest()->get() as $cate)
                    <li>
                        <a href="{{route('category.detail', ['id_toko' => $n->id_toko, 'id_kategori' => $cate->id_kategori])}}">{{$cate->nama_kategori}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>

    </nav>
@endpush

@section('content')
<h6 class="mt-3">"{{$search}}" Ditemukan Sebanyakan "{{$p->count()}}" di Toko {{$n->nama_toko}}</h6>
<hr>

<div class="row">
    @forelse ($p as $produk)
    <div class="col-lg-3 col-6">
        <a href="{{route('produk.detail', ['id_toko' => $id_toko, 'id_produk' => $produk->id_produk])}}" style="text-decoration: none">
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
