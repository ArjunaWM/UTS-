<?php

namespace App\Http\Controllers;

use App\Mobil;
use Illuminate\Http\Request;
use Auth;

class MobilController extends Controller
{
    public function index(){
        $mobil = Mobil::all();
        return response($mobil);
    }

    public function show($id){
        $mobil = Mobil::find($id);
        return response($mobil);
    }

    public function tambah(Request $request){
        try{    
            $mobil = new Mobil();
            $mobil->nama_mobil = $request->nama_mobil;
            $mobil->merk = $request->merk;
            $mobil->bahan_bakar = $request->bahan_bakar;
            $mobil->warna = $request->warna;
            $mobil->plat = $request->plat;
            $mobil->save();
            return response()->json([
                'status' => '1',
                'pesan' => 'Tambah mobil berhasil gan!',
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => '0',
                'pesan' => 'Tambah mobil gagal gan!',
            ]);
        }
    }

    public function ubah(Request $request, $id){
        try{    
            // $mobil = Mobil::where('id', $id)->first();
            $mobil = Mobil::find($id);
            $mobil->nama_mobil = $request->nama_mobil;
            $mobil->merk = $request->merk;
            $mobil->bahan_bakar = $request->bahan_bakar;
            $mobil->warna = $request->warna;
            $mobil->plat = $request->plat;
            $mobil->save();
            return response()->json([
                'status' => '1',
                'pesan' => 'Ubah data mobil berhasil gan',
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => '0',
                'pesan' => 'Ubah data mobil gagal gan',
            ]);
        }
    }

    public function hapus($id){
        try{
            $mobil = Mobil::find($id);
            $mobil->delete();
            return response()->json([
                'status' => '1',
                'pesan' => 'Hapus data mobil berhasil gan',
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => '0',
                'pesan' => 'Hapus data mobil gagal gan',
            ]);
        }
    }
}
