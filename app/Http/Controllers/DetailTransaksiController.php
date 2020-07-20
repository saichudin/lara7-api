<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailTransaksi;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        //eloquent retlationship use
        $detail = DetailTransaksi::find(1);
        // dd ($detail->transaksi);
        return response()->json([
            'data' => $detail->transaksi->nama_customer,
            'message' => 'success'
        ], 200);
    }
}
