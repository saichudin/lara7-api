<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
use App\Http\Resources\MobilResource;

class MobilController extends Controller
{
    public function index()
    {
        $mobil = Mobil::all();
        return new MobilResource($mobil);
    }

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
                'message' => 'success insert data'
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => $e
            ], 400);
        } 
    }

    public function show($id)
    {
        $mobil = Mobil::find($id);
        if (empty($mobil)) {
            return response()->json([
                'message' => 'no data found'
            ], 404);
        }

        return new MobilResource($mobil);
    }

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
                'message' => 'success insert data'
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => $e
            ], 400);
        } 
    }

    public function destroy($id)
    {
        $mobil = Mobil::destroy($id);
        if($mobil) {
            return response()->json([
                'message' => 'success delete data'
            ], 200);
        }
    }
}
