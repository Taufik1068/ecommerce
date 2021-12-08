@extends('layouts.customer')

@section('title', 'Cart')

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

@push('css')
<style>
    .skin-7 .num-in {
        float: left;
        width: 138px;
        border: 1px solid #a4a4a3;
    }

    .skin-7 input.in-num {
        font-family: 'HelveticaNeueCyr-Roman';
        font-size: 14px;
        float: left;
        height: 32px;
        width: 83px;
        border-left: 1px solid #a4a4a3;
        border-right: 1px solid #a4a4a3;
        background-color: #fff;
        text-align: center;
    }

    .skin-7 .num-in span {
        font-size: 24px;
        text-align: center;
        display: block;
        width: 46px;
        float: left;
        height: 32px;
        background-color: #f4f4f6;
        cursor: pointer;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    .skin-7 .num-in span:hover {
        background-color: #d7d7d8;
    }

    .skin-7 .num-in input {
        border: none;
        float: left;
        width: 44px;
        line-height: 34px;
        text-align: center;
        font-family: 'helveticaneuecyrbold';
    }

</style>
@endpush

@push('js')
<script>
    function calc() {
        let tots = 0;
        $(".cheks:checked").each(function () {
            tots += parseFloat($(this).data("price"));
        });

        $('#total').text((tots).toLocaleString('id', {
            style: 'currency',
            currency: 'IDR'
        }));
    }

    $(function () {
        $(document).on('change', '.cheks', calc);
        calc();
    });

    $(document).ready(function () {
        $('.num-in span').click(function () {
            var $input = $(this).parents('.num-block').find('input.in-num');
            if ($(this).hasClass('minus')) {
                var count = parseFloat($input.val());
                count = count < 1 ? 1 : count;
                if (count < 2) {
                    $(this).addClass('dis');
                } else {
                    $(this).removeClass('dis');
                }
                $input.val(count);
            } else {
                var count = parseFloat($input.val())
                $input.val(count);
                if (count > 1) {
                    $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                }
            }

            $input.change();
            return false;
        });
    });

    $(".qtybtn").click(function () {
        var key = $(this).attr('data');
        var cartqty = $("#cartqty_"+key).val();
        var id_toko = {{$n->id_toko}};
        if ($(this).hasClass('plus')) {
            
            $('#cartqty_'+key).val(parseInt(cartqty) + 1);
            updatecart(id_toko,key,parseInt(cartqty) + 1);


        } else if ($(this).hasClass('minus')) {
            $('#cartqty_'+key).val(parseInt(cartqty) - 1);
            updatecart(id_toko,key,parseInt(cartqty) - 1);

        }
    });



    function updatecart(id_toko,key,qty) {
        $.ajax({
            url: "{{url('updatecart')}}/"+id_toko+"/"+key+"/"+qty,
            success: function(result) {
                // alert(id_toko);
                location.reload();
            }
        })
    }

</script>
@endpush

@section('content')
<h6 class="mt-3">Menu Keranjang</h6>
<hr>


<form action="{{route('cart.checkout', $n->id_toko)}}" method="post">
    @csrf
    <div class="row">

        <div class="col-lg-12 mb-3">
            @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-block my-2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div id="message"></div>

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

        @php
        $i = 0;
        @endphp
        @foreach ($c as $key => $cart)
        <input type="hidden" name="id[]" value="{{$cart->model->id_produk}}">
        <input type="hidden" name="rowId" value="{{$cart->rowId}}">
        <input type="hidden" name="nama_produk[]" value="{{$cart->model->nama_produk}}">
        <input type="hidden" name="price[]" value="{{$cart->price}}">
        <input type="hidden" name="qty[]" value="{{$cart->qty}}">
        <div class="col-lg-2 col-3">
            <img src="{{asset('gambar_produk/'. $cart->model->gambar_produk)}}" class="img-fluid">
        </div>
        <div class="col-lg-5 col-6">
            <h5>{{$cart->model->nama_produk}}</h5>
            <p>Rp {{number_format($cart->price,0,',','.')}}</p>
            <p>Subtotal : Rp {{number_format($cart->subtotal,0,',','.')}}</p>
        </div>
        <div class="col-lg-3 col-6 ">
            <p>Qty :</p>
            <div class="num-block skin-7">
                <div class="num-in">
                    <span class="minus dis qtybtn" data="{{$cart->rowId}}">-</span>
                    <input type="text" class="in-num" id="cartqty_{{$cart->rowId}}" value="{{$cart->qty}}"  readonly="">
                    <span class="plus qtybtn" data="{{$cart->rowId}}">+</span>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-6">
            <div class="form-check">
                <input class="form-check-input cheks" type="checkbox" name="checkout[]" value="{{$cart->model->id_produk}}"
                    id="check" data-price="{{$cart->subtotal}}">
            </div>
        </div>
        <div class="col-lg-1 col-2">

            <a href="{{route('cart.destroy', ['id' => $cart->rowId, 'id_toko' => $n->id_toko])}}" type="submit" role="button"
                class="btn btn-danger btn-block" style="font-size:13px;">Hapus</a>
        </div>
        @php
        $i++;
        @endphp
        @endforeach

        <div class="col-lg-4 ml-auto mt-3">
            <div class="card">
                <div class="card-header">Total</div>
                <div class="card-body">
                    <span id="total">
                        {{-- Rp. {{number_format(Cart::subtotal(),0,',','.')}} --}}
                    </span>
                    <hr>
                    {{-- <a href="{{route('checkout.index')}}" class="btn btn-primary btn-block">Buat Pesanan</a> --}}
                    <button type="submit" class="btn btn-primary btn-block">Buat Pesanan</button>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- <form action="{{route('cart.deleteCheckout')}}" method="post">
@csrf
<button type="submit">Test</button></form>

{{Cart::instance('checkout')->content()}} --}}

@endsection
