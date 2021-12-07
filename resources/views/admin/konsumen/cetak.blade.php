<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative:
            border: 1px solid #543535;
        }
        
        table.imagetable {
            font-family: Times, Helvetica, sans-serif;
            font-size: 15px;
            
            
            border-collapse: collapse;
                height: 20mm;
                width: 110mm;
                padding: 3mm;
                padding-bottom: 10px;
                margin:1px;
                background: white;
            
        }

        table.imagetable th {
            background: white;
            border-width: 1px;
            padding-left: 20px;
            padding: 25px;
            border-style: solid;
            border-color: #999999;
        }

        table.imagetable td {
            background:white;
            border-width: 1px;
            padding-left: 10px;
            padding: 10px;
            border-style: solid;
            border-color: #999999;
        }

            .pdf{
        margin-left: 0px;
        margin-right: 0px;
        }

    </style>

    <title> Laporan Konsumen {{ date('d M Y' , strtotime($tglawal)) }} s/d {{ date('d M Y' , strtotime($tglakhir)) }} </title>
</head>

<body>
    <div class="pdf">
     <font size="5" >
        <b> {{$data2->nama_toko}} </b>
     </font>
     <br>
     <font size="3" >
        <b> No. Telp</b> &nbsp; <b>: {{$data2->telp_toko}}</b>
     </font>
     <br>
     <font size="3" >
        <b> {{$data2->alamat_toko}} </b>
     </font>
     <br>
     <font size="3" >
        <b>Website</b> &nbsp;&nbsp; <b>: {{$data2->website}}</b> &nbsp;&nbsp;&nbsp;&nbsp; <b>Instagram</b>&nbsp;&nbsp;<b>: {{$data2->instagram}}</b>  &nbsp;&nbsp;&nbsp;&nbsp; <b>Facebook</b>&nbsp;&nbsp;<b>: {{$data2->facebook}}</b>
     </font>
     <br>
     <hr>
     <br>


        <center>
            <font size="3">
                <b>DAFTAR KONSUMEN</b>
            </font>
            <br>
        </center>
        <br> 

        <font size="2">
                <b>Tanggal {{ date('d M Y' , strtotime($tglawal)) }} s.d {{ date('d M Y' , strtotime($tglakhir)) }}</b>
        </font>

            <table class="imagetable">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Produk</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Barang</th>
                    <th>Jenis Pengiriman</th>
                    <th>Total Pembayaran</th>
                    <th>Status</th>
                </tr> 
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->Pesanan->nama_pembeli }}</td>
                    <td>{{ $item->Pesanan->alamat_pembeli }}</td>
                    @foreach($data1 as $key => $value)
                    <td class="text-center">
                        {{ $value->Produk1->nama_produk }} 
                        </br>
                        {{ $value->Produk2->nama_produk  }} 
                        </br>
                        {{ $value->Produk3->nama_produk  }} 
                        </br>
                        {{ $value->Produk4->nama_produk  }}
                        </br>
                        {{ $value->Produk5->nama_produk  }}      
                    </td>
                    <td class="text-center">
                        {{ $value->jumlah1 }} Buah
                        </br>
                        {{ $value->jumlah2 }} Buah
                        </br>
                        {{ $value->jumlah3 }} Buah
                         </br>
                        {{ $value->jumlah4 }} Buah
                        </br>
                        {{ $value->jumlah5 }} Buah    
                    </td>
                    <td class="text-center">
                        Rp. {{ $value->Produk1->harga_produk }} 
                        </br>
                        Rp. {{ $value->Produk2->harga_produk  }} 
                        </br>
                        Rp. {{ $value->Produk3->harga_produk  }} 
                        </br>
                        Rp. {{ $value->Produk4->harga_produk  }}
                        </br>
                        Rp. {{ $value->Produk5->harga_produk  }}      
                    </td>
                    @endforeach
                    <td>{{ $item->Pesanan->jenis_pengiriman}}</td>
                    <td>Rp. {{ $item->total_pembayaran}}</td>
                    <td>{{ $item->status}}</td>
                </tr>
                @endforeach
            </table>
    </div>

    <script type="text">
        window.print();
    </script>

</body>