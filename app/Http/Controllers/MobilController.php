<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'mobil' => Mobil::all()
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $mobil = Mobil::create([
                'nopol' => $request->input('nopol'),
                'merk' => $request->input('merk'),
                'tipe' => $request->input('tipe'),
                'warna' => $request->input('warna'),
                'tahun' => $request->input('tahun'),
                'jenis' => $request->input('jenis'),
                'transmisi' => $request->input('transmisi'),
                'harga_per_hari' => $request->input('harga_per_hari'),
                'status' => $request->input('status')
            ]);

            return response()->json([
                'message' => 'sucess insert data'
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => $e
            ], 400);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Mobil::find($id);
        if (empty($mobil)) {
            return response()->json([
                'mobil' => 'tidak ada data'
            ], 404);
        }

        return response()->json([
            'mobil' => Mobil::find($id)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $mobil = Mobil::find($id)->update([
                'nopol' => $request->input('nopol'),
                'merk' => $request->input('merk'),
                'tipe' => $request->input('tipe'),
                'warna' => $request->input('warna'),
                'tahun' => $request->input('tahun'),
                'jenis' => $request->input('jenis'),
                'transmisi' => $request->input('transmisi'),
                'harga_per_hari' => $request->input('harga_per_hari'),
                'status' => $request->input('status')
            ]);

            return response()->json([
                'message' => 'sucess insert data'
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => $e
            ], 400);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::destroy($id);
        if($mobil) {
            return response()->json([
                'message' => 'sucess delete data'
            ], 200);
        }
    }
}
