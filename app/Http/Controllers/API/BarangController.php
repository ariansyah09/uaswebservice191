<?php

namespace App\Http\Controllers\API;

use App\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }
    public function index()
    {

        // cara 1
        // return Product::all();

        // cara 2
        $data = Barang::with('kategori')->get();
        return response()->json([
            'pesan' => 'Data Berhasil ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "nama_barang"          => "required",
            "harga"           => "required",
            "kategori_id"             => "required|integer",
            "keterangan"               => "required"
        ]);

        if ($validasi->passes()){
            $data = Barang::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil ditambahkan',
                'data' => $data
            ], 200);
        }
        return response()->json([
            'pesan' => 'Data Gagal disimpan',
            'data' => $validasi->errors()->all()
        ], 400);
    }


    public function show($id)
    {
        // cara 1
        // return $id;
        // Cara 2
        $data = Barang::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak ditemukan',
                'data' => ''
            ], 404);
        }
        return response()->json([
            'pesan' => 'Data Berhasil ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

//    Cara hapus 1
//    public function destroy(Product $id)
//    {
//       $id->delete();
//       return response()->json([
//          'pesan' => 'Data Berhasil dihapus'
//       ]);
//    }

//    Cara hapus 2
    public function destroy($id)
    {
        $data = Barang::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak ditemukan',
                'data' => ''
            ], 404);
        }

        $data->delete();
        return response()->json([
            'pesan' => 'Data Berhasil ditemukan',
            'data' => $data
        ], 200);
    }
}
