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

    <title> Laporan Pemasok {{ date('d M Y' , strtotime($tglawal)) }} s/d {{ date('d M Y' , strtotime($tglakhir)) }} </title>
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
                <b>DAFTAR PRODUK MASUK</b>
            </font>
            <br>
        </center>
        <br> 
        
        <font size="2">
                <b>Tanggal {{ date('d F Y' , strtotime($tglawal)) }} s.d {{ date('d F Y' , strtotime($tglakhir)) }}</b>
        </font>
        <br>

            <table class="imagetable">
                <tr>
                    <th>No.</th>
                    <th>Nama Pemasok</th>
                    <th>Nama Produk</th>
                    <th>Tanggal Beli</th>
                    <th>Jumlah Beli</th>
                    <th>Harga persatuan</th>
                    <th>Total Pembayaran</th>
                </tr> 
                @foreach ($data as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}.</td>
                    <td>{{ $item->pemasok->nama_pemasok }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ date('d M Y' , strtotime($item->tanggal_beli))}}</td>
                    <td class="text-center">{{ $item->jumlah_beli}} Buah</td>
                    <td>Rp. {{ $item->harga_satuan}}</td>
                    <td>Rp. {{ $item->total_pembayaran}}</td>
                </tr>
                @endforeach
            </table>
    </div>

    <script type="text">
        window.print();
    </script>

</body>