<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Namatoko;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index($id_toko)
    {
        $c = Cart::instance('cart_' . $id_toko)->content();
        $n = Namatoko::where('id_toko', $id_toko)->first();
        return view('cart', compact('c', 'n'));
    }

    public function buyNow(Request $request, $id_toko)
    {
        if (Cart::instance('buyNow_' . $id_toko)->count() == 0) {
            Cart::instance('buyNow_' . $id_toko)->add(
                $request->id,
                $request->nama_produk,
                1,
                $request->price,
                [
                    'harga_produk' => $request->price,
                ],
                0
            )->associate('App\Models\Produk');
        } else {
            Cart::instance('buyNow_' . $id_toko)->destroy();
            Cart::instance('buyNow_' . $id_toko)->add(
                $request->id,
                $request->nama_produk,
                1,
                $request->price,
                [
                    'harga_produk' => $request->price,
                ],
                0
            )->associate('App\Models\Produk');
        }
        return redirect()->route('cart.buyNowIndex', $id_toko)->with('sukses', 'Produk berhasil di tambahkan ke checkout');
    }
    public function store(Request $request, $id_toko)
    {
        // $duplicate = Cart::search(function ($cartItem, $rowId) use ($request) {
        //     return $cartItem->id == $request->id;
        // });

        // if ($duplicate->isNotEmpty()) {
        //     return redirect()->back()->with('gagal', 'Product sudah ada di dalam keranjang anda');
        // }
        Cart::instance('cart_' . $id_toko)->add(
            $request->id,
            $request->nama_produk,
            1,
            $request->price,
            [
                'harga_produk' => $request->price,
            ],
            0
        )->associate('App\Models\Produk');
        return redirect()->back()->with('sukses', 'Produk berhasil di tambahkan ke keranjang');
    }

    public function updateCart($id_toko, $key, $qty)
    {
        Cart::instance('cart_' . $id_toko)->update($key, $qty);
        // return redirect()->back()->with('sukses', $id_toko);

        // $cart = session()->get('cart');
        // $cart[$key]['qty'] = $qty;
        // session()->put('cart', $cart);
    }

    public function destroy($id, $id_toko)
    {
        Cart::instance('cart_' . $id_toko)->remove($id);
        return redirect()->back()->with('sukses', 'Product di dalam keranjang berhasil di hapus');
    }

    public function checkout(Request $request, $id_toko)
    {
        // foreach ($request->checkout as $prod) {
        //     $p = Cart::get($prod);
        //     print_r($p);
        //     die;
        // }

        $request->validate(
            [
                'checkout' => 'required',
            ],
            ['required' => 'Harap pilih barang yang ingin di checkout'],
        );

        // if (count($request->checkout) > 0) {
        //     if (Cart::instance('checkout')->count() > 0) {
        //         Cart::instance('checkout')->destroy();
        //         foreach ($request->checkout as $key => $c) {
        //             Cart::instance('checkout')->add([
        //                 'id' => $request->id[$key],
        //                 'name' => $request->nama_produk[$key],
        //                 'qty' => $request->qty[$key],
        //                 'price' => $request->price[$key],
        //                 'options' => [
        //                     'harga_produk' => $request->price[$key],
        //                 ],
        //                 0,
        //             ])->associate('App\Models\Produk');
        //         }
        //     } else {
        //         foreach ($request->checkout as $key => $c) {
        //             Cart::instance('checkout')->add([
        //                 'id' => $request->id[$key],
        //                 'name' => $request->nama_produk[$key],
        //                 'qty' => $request->qty[$key],
        //                 'price' => $request->price[$key],
        //                 'options' => [
        //                     'harga_produk' => $request->price[$key],
        //                 ],
        //                 0,
        //             ])->associate('App\Models\Produk');
        //         }
        //     }
        // } elseif ($request->checkout == $request->rowId) {
        //     Cart::instance('checkout')->add([
        //         'id' => $request->id,
        //         'name' => $request->nama_produk,
        //         'qty' => $request->qty,
        //         'price' => $request->price,
        //         'options' => [
        //             'harga_produk' => $request->price,
        //         ],
        //         0,
        //     ])->associate('App\Models\Produk');
        // }

        // if (count($request->checkout) > 1) {
        //     foreach ($request->checkout as $key => $rowId) {
        //         if (Cart::instance('checkout')->count() > 0) {
        //             Cart::instance('checkout')->destroy();
        //             foreach ($request->checkout as $key => $c) {
        //                 Cart::instance('checkout')->add([
        //                     'id' => $request->id[$key],
        //                     'name' => $request->nama_produk[$key],
        //                     'qty' => $request->qty[$key],
        //                     'price' => $request->price[$key],
        //                     'options' => [
        //                         'harga_produk' => $request->price[$key],
        //                     ],
        //                     0,
        //                 ])->associate('App\Models\Produk');
        //             }
        //         } else {
        //             foreach ($request->checkout as $key => $c) {
        //                 Cart::instance('checkout')->add([
        //                     'id' => $request->id[$key],
        //                     'name' => $request->nama_produk[$key],
        //                     'qty' => $request->qty[$key],
        //                     'price' => $request->price[$key],
        //                     'options' => [
        //                         'harga_produk' => $request->price[$key],
        //                     ],
        //                     0,
        //                 ])->associate('App\Models\Produk');
        //             }
        //         }
        //     }
        // } else {
        //     foreach ($request->checkout as $key => $rowId) {
        //         $cart = Cart::content()->whereIn('rowId', $rowId);
        //         // foreach ($cart as $key => $c) {
        //         //     Cart::instance('checkout')->add([
        //         //         'id' => $c->id,
        //         //         'name' => $c->name,
        //         //         'qty' => $c->qty,
        //         //         'price' => $c->price,
        //         //         'options' => [
        //         //             'harga_produk' => $c->price,
        //         //         ],
        //         //         0,
        //         //     ])->associate('App\Models\Produk');
        //         // }
        //         return view('test', compact('cart'));
        //     }
        // }

        // foreach ($request->input('checkout') as $key => $rowId) {
        //     $cart = Cart::content()->whereIn('id', $rowId);

        $cart = Cart::instance('cart_' . $id_toko)->content()->whereIn('id', $request->checkout);

        if (Cart::instance('checkout_' . $id_toko)->count() > 0) {
            Cart::instance('checkout_' . $id_toko)->destroy();
            foreach ($cart as $key => $c) {
                Cart::instance('checkout_' . $id_toko)->add([
                    'id' => $c->id,
                    'name' => $c->name,
                    'qty' => $c->qty,
                    'price' => $c->price,
                    'options' => [
                        'harga_produk' => $c->price,
                        'rowId' => $c->rowId,
                    ],
                    0,
                ])->associate('App\Models\Produk');
            }
        } else {
            foreach ($cart as $key => $c) {
                Cart::instance('checkout_' . $id_toko)->add([
                    'id' => $c->id,
                    'name' => $c->name,
                    'qty' => $c->qty,
                    'price' => $c->price,
                    'options' => [
                        'harga_produk' => $c->price,
                        'rowId' => $c->rowId,

                    ],
                    0,
                ])->associate('App\Models\Produk');
            }
        }

        return redirect()->route('checkout.index', $id_toko)->with('sukses', 'Produk berhasil di tambahkan ke checkout');
    }

    public function deleteCheckout()
    {
        Cart::instance('checkout')->destroy();
        return redirect()->back();
    }
}
