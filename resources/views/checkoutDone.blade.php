@extends('layouts.customer')

@section('title', 'Petunjuk Bayaran')

@push('nav')
   

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
<h6 class="mt-3">Petunjuk Bayaran</h6>
<hr>

@if ($random = Session::get('random'))
<h6>Yeay,Sedikit Lagiiii</h6>
<h6>Kode Pesanan Anda :</h6>
<h2 class="mt-2 mb-4">{{$random}}</h2>

<h6>Silahkan Transfer Ke</h6>

<ul>
    <li><h6>Dana = 08123456</h6></li>
    <li><h6>OVO = 08123456</h6></li>
    <li><h6>BNI = 08123456</h6></li>
</ul>

<p>Jangan lupa segera konfirmasi pembayaranmu dengan klik <a href="">DISINI</a> yaa</p>
@endif




@endsection
