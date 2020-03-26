<?php

namespace App\Http\Controllers;
use App\Produk;
use Auth;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
   
    public function index()
    {
        $data = Produk::all();
        {
            return response($data);
        }
    }

    public function show($id)
    {
        $data = Produk::where('id',$id)->get();
        return response($data);
    }

    public function store(Request $request)
    {
        try {
            $data = new Produk();
            $data->nama_produk = $request->input('nama_produk');
            $data->deskripsi = $request->input('deskripsi');
            $data->harga = $request->input('harga');
            $data->gambar = $request->input('gambar');
            $data->lokasi = $request->input('lokasi');
            $data->save();
            return response()->json([
                'status'    => '1',
                'message'   => 'Tambah data produk berhasil !'
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'status'    => '1',
                'message'   => 'Tambah data produk gagal !'
            ]);
        }
    }

   
    public function update(Request $request, $id)
    {
        try {
            $data = Produk::where('id',$id)->first();
            $data->nama_produk = $request->input('nama_produk');
            $data->deskripsi = $request->input('deskripsi');
            $data->harga = $request->input('harga');
            $data->gambar = $request->input('gambar');
            $data->lokasi = $request->input('lokasi');
            $data->save();
            return response()->json([
                'status'    => '1',
                'message'   => 'Ubah data produk berhasil !'
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'status'    => '1',
                'message'   => 'Ubah data produk gagal !'
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $data = Produk::where('id',$id)->first();
            $data->delete();
            return response()->json([
                'status'    => '1',
                'message'   => 'Hapus data produk berhasil !'
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'status'    => '1',
                'message'   => 'Hapus data produk gagal !'
            ]);
        }
        
    }
}
