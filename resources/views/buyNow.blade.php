@extends('layouts.customer')

@section('title', 'Membuat Pesanan')

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
                <form class="form-inline my-2 my-lg-0 mx-auto" action="{{route('customer.searchProduk', $n->id_toko)}}" method="GET">
                    
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

@push('js')
<script>
    window.disableInput = function () {
        if (document.getElementById("datang_ketempat").checked) {
            document.getElementById("alamat").disabled = true;
            document.getElementById("ongkir").style.display = 'none';
            document.getElementById("ongkir1").style.display = 'none';
            if(document.getElementById("donasi").checked) {
                document.getElementById("total").innerHTML = 'Rp. {{number_format(Cart::instance('buyNow_'.$id_toko)->subtotal() + 5000,0,', ','.')}}';
                document.getElementById("donasi1").style.display = 'block';
            document.getElementById("donasi2").style.display = 'block';
            } else {
                document.getElementById("total").innerHTML = 'Rp. {{number_format(Cart::instance('buyNow_'.$id_toko)->subtotal(),0,', ','.')}}';
                document.getElementById("donasi1").style.display = 'none';
            document.getElementById("donasi2").style.display = 'none';
            }
        } else {
            document.getElementById("alamat").disabled = false;
            document.getElementById("ongkir").style.display = 'block';
            document.getElementById("ongkir1").style.display = 'block';
            if(document.getElementById("donasi").checked) {
                document.getElementById("total").innerHTML = "Rp. {{number_format(Cart::instance('buyNow_'.$id_toko)->subtotal() + 10000 + 5000,0,',','.')}}";
                document.getElementById("donasi1").style.display = 'block';
            document.getElementById("donasi2").style.display = 'block';
            } else {
                document.getElementById("total").innerHTML = "Rp. {{number_format(Cart::instance('buyNow_'.$id_toko)->subtotal() + 10000,0,',','.')}}";
                document.getElementById("donasi1").style.display = 'none';
            document.getElementById("donasi2").style.display = 'none';
            }
        }
    }

</script>
@endpush

@push('css')
<style>
    #ongkir,
    #ongkir1,#donasi1,
    #donasi2 {
        display: none;
    }

</style>
@endpush

@section('content')
<h6 class="mt-3">Membuat Pesanan</h6>
<hr>


<div class="row">

    <div class="col-lg-12 mb-3">
        @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block my-2">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    </div>
</div>

<h5>Lengkapi petunjuk yang tersedia untuk melanjutkan pesanan</h5>

<form action="{{route('buyNow.store', $id_toko)}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group mt-4">
                <div class="row">
                    <div class="col-lg-4 col-2 my-auto">
                        <label for="">Nama</label>
                    </div>
                    <div class="col-lg-8 col-10">
                        <input type="text" name="name" class="form-control form-control-sm">
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <div class="row">
                    <div class="col-lg-4 col-2 my-auto">
                        <label for="">No Hp</label>
                    </div>
                    <div class="col-lg-8 col-10">
                        <input type="text" name="no_hp" class="form-control form-control-sm">
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <div class="row">
                    <div class="col-lg-4 col-2 my-auto">
                        <label for="">Email</label>
                    </div>
                    <div class="col-lg-8 col-10">
                        <input type="email" name="email" class="form-control form-control-sm">
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <div class="row">
                    <div class="col-lg-4 col-2 my-auto">
                        <label for="">Pilihan Pengiriman</label>
                    </div>
                    <div class="col-lg-8 col-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pilihan_pengiriman" id="datang_ketempat"
                                value="Datang Ketempat" onclick="disableInput()" checked>
                            <label class="form-check-label" for="datang_ketempat">Datang Ketempat</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pilihan_pengiriman" id="diantar"
                                value="Diantar" onclick="disableInput()">
                            <label class="form-check-label" for="diantar">Diantar</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <div class="row">
                    <div class="col-lg-4 col-2 my-auto">
                        <label for="">Alamat</label>
                    </div>
                    <div class="col-lg-8 col-10">
                        <textarea name="alamat" id="alamat" class="form-control" disabled rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <div class="row">
                    <div class="col-lg-4 col-2 my-auto">
                        <label for="">Pembayaran</label>
                    </div>
                    <div class="col-lg-8 col-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pembayaran" id="tunai" value="Tunai">
                            <label class="form-check-label" for="tunai">Tunai</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pembayaran" id="transfer"
                                value="Transfer">
                            <label class="form-check-label" for="transfer">Transfer</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="donasi" value="donasi" name="donasi" onclick="disableInput()">
                    <label class="form-check-label" for="donasi">Donasi 5.000 Bantu Penanggulangan COVID - 19</label>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6>Ringkasan Belanja</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <small> Total Harga ({{Cart::instance('buyNow_'.$id_toko)->count()}} Barang) :</small>
                        </div>
                        <div class="col-6">
                            <small>Rp. {{number_format(Cart::instance('buyNow_'.$id_toko)->subtotal(),0,',','.')}}</small>
                        </div>
                        <div class="col-6" id="ongkir">
                            <small> Total Ongkos Kirim :</small>
                        </div>
                        <div class="col-6" id="ongkir1">
                            <small>Rp. 10.000</small>
                        </div>

                        <div class="col-6" id="donasi1">
                            <small> Donasi :</small>
                        </div>
                        <div class="col-6" id="donasi2">
                            <small>Rp. 5.000</small>
                        </div>
                        <hr style="background-color: grey;height:1px;width:100%;">
                        <div class="col-6">
                            <small>Total :</small>
                        </div>
                        <div class="col-6">
                            <small id="total">Rp. {{number_format(Cart::subtotal(),0,',','.')}}</small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-sm mt-3">Bayar</button>
                </div>
            </div>
        </div>


    </div>
</form>

<hr>
<p>Di informasikan Kepada Customer Yang Terhormat Saat Melakukan Pembayaran :</p>
<ul>
    <li>Pembayaran Melalui Rekening Toko dengan Dana,OVO,BNI</li>
    <li>Pembayaran Dilakukan Maksimal 24 Jam Setelah Pesanan Barang</li>
</ul>

@endsection
