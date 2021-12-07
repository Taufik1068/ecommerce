<?php

namespace App\Http\Controllers;

use App\Namatoko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function show($id_toko)
    {
        $n = Namatoko::where('id_toko', $id_toko)->first();
        return view('customer.toko.show', compact('n'));
    }
}
