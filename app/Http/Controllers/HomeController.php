<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Pemasok;
use App\Models\Pesanan;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_produk=Produk::where('id_user', Auth::id())->count();
        $total_pemasok=Pemasok::where('id_user', Auth::id())->count();
        $total_pesanan=Pesanan::where('id_user', Auth::id())->count();

        return view('home', compact('total_produk', 'total_pemasok', 'total_pesanan'));
        //return view('home');
    }

}
