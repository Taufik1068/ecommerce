<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>websiteKU - @yield('title')</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css'>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

    </style>
    @stack('css')
</head>


<body>
    <div class="overlay"></div>

    @stack('nav')


    <div class="container" style="min-height:100%;margin-bottom:-50px">
        @yield('content')
    </div>
    <div style="height: 50px"></div>
    <footer class="mt-3" style="height: 50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <h6>Ikuti Kami</h6>
                    <ul>
                        <li><a href=""><i class='bx bxl-instagram'></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h6>Bantuan</h6>
                    <ul>
                        <li><a href="">
                                FAQ
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h6>Tentang</h6>
                    <ul>
                        <li><a href="">
                                Syarat Penggunaan
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Kebijakan Penukaran dan Pengembalian
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h6>Alamat</h6>
                    <ul>
                        <li><a href="">
                                Jl. Ra Basyid Bandar Lampung
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6>Note</h6>
                    <p>websiteKU Melayani Grosir,Eceran,Perabot Admin 1 - 08970251992 bisa COD untuk wilayah Bdl Jl. Ra.
                        Rasyid Bandar Lampung</p>
                </div>

                <div class="col-lg-12 my-3" style="border-top: 1px solid black">
                    <p>websiteKu adalah marketplace B2C yang menghubungkan pembeli dan penjual dengan kategori berbagai
                        macam kebutuhan anda, untuk membeli dan menjual secara online dengan mudah. Jelajahi katalog
                        digital dengan harga paling kompetitif dari penjual terpercaya. Nikmati juga layanan pengiriman
                        yang cepat dan pembayaran online dan offline yang aman.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    @stack('js')
    <script src="{{asset('js/script.js')}}"></script>

</body>

</html>
