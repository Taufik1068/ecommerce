<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Namatoko;
use App\PesananProduk;
use Illuminate\Http\Request;
use Cart;

class IndexController extends Controller
{
    public function index()
    {
        $p = Produk::latest()->take(8)->get();
        return view('customer', compact('p'));
    }

    public function produk()
    {
        $p = Produk::latest()->paginate(8);
        return view('produk', compact('p'));
    }

    public function produkDetail($id_toko, $id_produk)
    {
        $n = Produk::where('id_produk', $id_produk)->first();
        return view('produk.detail', compact('n'));
    }

    public function categoryDetail($id_toko, $id_kategori)
    {
        $c = Kategori::where('id_kategori', $id_kategori)->first();
        $n = Namatoko::where('id_toko', $id_toko)->first();
        return view('produk.category', compact('c', 'n'));
    }

    public function buyNowIndex($id_toko)
    {
        if (Cart::instance('buyNow_' . $id_toko)->count() > 0) {
            $c = Cart::instance('buyNow_' . $id_toko)->content();
            $n = Namatoko::where('id_toko', $id_toko)->first();

            return view('buyNow', compact('c', 'id_toko', 'n'));
        } else {
            $c = Cart::instance('buyNow_' . $id_toko)->content();
            return redirect()->back();
        }
    }


    public function checkout($id_toko)
    {
        if (Cart::instance('checkout_' . $id_toko)->count() > 0) {
            $c = Cart::instance('checkout_' . $id_toko)->content();
            $n = Namatoko::where('id_toko', $id_toko)->first();

            return view('checkout', compact('c', 'id_toko', 'n'));
        } else {
            $c = Cart::instance('checkout')->content();
            return redirect()->back();
        }
    }
    public function checkoutDone()
    {
        return view('checkoutDone');
    }

    public function checkoutStore(Request $request, $id_toko)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'pilihan_pengiriman' => 'required',
            'pembayaran' => 'required',
        ]);
        $random = $this->generateRandomString(11);
        $ongkir = 10000;
        $donasi = 5000;
        $pesanan = new Pesanan;
        $pesanan->nama_pembeli = $request->name;
        $pesanan->id_user = $id_toko;
        $pesanan->telp_pembeli = $request->no_hp;
        $pesanan->email_pembeli = $request->email;
        $pesanan->jenis_pengiriman = $request->pilihan_pengiriman;
        $pesanan->alamat_pembeli = $request->alamat;
        $pesanan->jenis_pembayaran = $request->pembayaran;
        $pesanan->status = 'Pending';
        if ($request->pilihan_pengiriman == "Diantar" && $request->donasi == "donasi") {
            $request->validate([
                'alamat' => 'required',
            ]);
            $pesanan->total = Cart::instance('checkout_' . $id_toko)->subtotal() + $ongkir + $donasi;
        } elseif ($request->pilihan_pengiriman == "Datang Ketempat" && $request->donasi == "donasi") {
            $pesanan->total = Cart::instance('checkout_' . $id_toko)->subtotal() + $donasi;
        } elseif ($request->pilihan_pengiriman == "Diantar") {
            $pesanan->total = Cart::instance('checkout_' . $id_toko)->subtotal() + 10000;
        } else {
            $pesanan->total = Cart::instance('checkout_' . $id_toko)->subtotal();
        }
        $pesanan->save();

        // Pembayaran
        $pembayaran = new Pembayaran;
        $pembayaran->id_pesanan = $pesanan->id_pesanan;
        $pembayaran->id_user = $id_toko;
        $pembayaran->harga_pengiriman = 10000;
        $pembayaran->kode_pembayaran = $random;
        // $pembayaran->tanggal_pengiriman = \Carbon\Carbon::now();
        if ($request->pilihan_pengiriman == "Diantar" && $request->donasi == "donasi") {
            $request->validate([
                'alamat' => 'required',
            ]);
            $pembayaran->total_pembayaran = Cart::instance('checkout_' . $id_toko)->subtotal() + $ongkir + $donasi;
        } elseif ($request->pilihan_pengiriman == "Datang Ketempat" && $request->donasi == "donasi") {
            $pembayaran->total_pembayaran = Cart::instance('checkout_' . $id_toko)->subtotal() + $donasi;
        } elseif ($request->pilihan_pengiriman == "Diantar") {
            $pembayaran->total_pembayaran = Cart::instance('checkout_' . $id_toko)->subtotal() + 10000;
        } else {
            $pembayaran->total_pembayaran = Cart::instance('checkout_' . $id_toko)->subtotal();
        }
        $pembayaran->save();
        foreach (Cart::instance('checkout_' . $id_toko)->content() as $checkout) {
            PesananProduk::create([
                'id_pesanan' => $pesanan->id_pesanan,
                'id_produk' => $checkout->model->id_produk,
                'jumlah' => $checkout->qty,
                'harga_beli' => $checkout->subtotal,
            ]);

            Cart::instance('cart_' . $id_toko)->remove($checkout->options->rowId);
        }


        Cart::instance('checkout_' . $id_toko)->destroy();

        $n = Namatoko::where('id_toko', $id_toko)->first();

        return redirect()->route('checkout.done', $id_toko)->with(['random' => $random])->with(['n' => $n]);
    }

    public function buyNowStore(Request $request, $id_toko)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'pilihan_pengiriman' => 'required',
            'pembayaran' => 'required',
        ]);
        $random = $this->generateRandomString(11);
        $ongkir = 10000;
        $donasi = 5000;
        $pesanan = new Pesanan;
        $pesanan->nama_pembeli = $request->name;
        $pesanan->id_user = $id_toko;
        $pesanan->telp_pembeli = $request->no_hp;
        $pesanan->email_pembeli = $request->email;
        $pesanan->jenis_pengiriman = $request->pilihan_pengiriman;
        $pesanan->alamat_pembeli = $request->alamat;
        $pesanan->jenis_pembayaran = $request->pembayaran;
        $pesanan->status = 'Pending';
        if ($request->pilihan_pengiriman == "Diantar" && $request->donasi == "donasi") {
            $request->validate([
                'alamat' => 'required',
            ]);
            $pesanan->total = Cart::instance('buyNow_' . $id_toko)->subtotal() + $ongkir + $donasi;
        } elseif ($request->pilihan_pengiriman == "Datang Ketempat" && $request->donasi == "donasi") {
            $pesanan->total = Cart::instance('buyNow_' . $id_toko)->subtotal() + $donasi;
        } elseif ($request->pilihan_pengiriman == "Diantar") {
            $pesanan->total = Cart::instance('buyNow_' . $id_toko)->subtotal() + 10000;
        } else {
            $pesanan->total = Cart::instance('buyNow_' . $id_toko)->subtotal();
        }
        $pesanan->save();

        // Pembayaran
        $pembayaran = new Pembayaran;
        $pembayaran->id_pesanan = $pesanan->id_pesanan;
        $pembayaran->id_user = $id_toko;
        $pembayaran->harga_pengiriman = 10000;
        $pembayaran->kode_pembayaran = $random;
        // $pembayaran->tanggal_pengiriman = \Carbon\Carbon::now();
        if ($request->pilihan_pengiriman == "Diantar" && $request->donasi == "donasi") {
            $request->validate([
                'alamat' => 'required',
            ]);
            $pembayaran->total_pembayaran = Cart::instance('buyNow_' . $id_toko)->subtotal() + $ongkir + $donasi;
        } elseif ($request->pilihan_pengiriman == "Datang Ketempat" && $request->donasi == "donasi") {
            $pembayaran->total_pembayaran = Cart::instance('buyNow_' . $id_toko)->subtotal() + $donasi;
        } elseif ($request->pilihan_pengiriman == "Diantar") {
            $pembayaran->total_pembayaran = Cart::instance('buyNow_' . $id_toko)->subtotal() + 10000;
        } else {
            $pembayaran->total_pembayaran = Cart::instance('buyNow_' . $id_toko)->subtotal();
        }
        $pembayaran->save();
        foreach (Cart::instance('buyNow_' . $id_toko)->content() as $checkout) {
            PesananProduk::create([
                'id_pesanan' => $pesanan->id_pesanan,
                'id_produk' => $checkout->model->id_produk,
                'jumlah' => $checkout->qty,
                'harga_beli' => $checkout->subtotal,
            ]);
        }


        Cart::instance('buyNow_' . $id_toko)->destroy();

        $n = Namatoko::where('id_toko', $id_toko)->first();

        return redirect()->route('checkout.done', $id_toko)->with('random', $random)->with('n', $n);
    }

    public  function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function search(Request $request, $id_toko)
    {
        $search = $request->q;
        $p = Produk::where('nama_produk', 'like', '%' . $search . '%')->where('id_user', '=', $id_toko)->latest()->get();
        $n = Namatoko::where('id_toko', $id_toko)->first();
        return view('produk.search', compact('p', 'search', 'id_toko', 'n'));
    }

    public function searchAll(Request $request)
    {
        $search = $request->q;
        $p = Produk::where('nama_produk', 'like', '%' . $search . '%')->latest()->get();
        return view('produk.searchAll', compact('p', 'search'));
    }
}
