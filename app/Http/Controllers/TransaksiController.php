<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Http\Resources\TransaksiResource;
use App\Http\Resources\TransaksiCollection;

class TransaksiController extends Controller
{
    public function index()
    {
        //eloquent retlationship use
        //$trx = Transaksi::find(1)->detail()->where('mobil_id',4)->get();
        //$trx = Transaksi::all();
        //jika menggunakan wheanloaded model harus didefine relasinya dengan 'with' 
        // $trx = Transaksi::with('detail')->find(1);

        //atau juga bisa menggunakan 'load'
        $trx = Transaksi::find(1);
        $trx = $trx->load('detail');
        //dd($trx);
        //return new TransaksiCollection($trx);
        return new TransaksiResource($trx);
        // return response()->json([
        //     'data' => $trx,
        //     'message' => 'success'
        // ], 200);
    }
}
