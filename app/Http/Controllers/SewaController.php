<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sewa;
use App\Mobil;

class SewaController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sewa(Request $request, $id)
    {
        try{
            $sewa = new Sewa();
            $sewa->id_mobil = $id;
            $sewa->nama_peminjam = $request->nama_peminjam;
            $sewa->lama_sewa = $request->lama_sewa;
            $sewa->harga_sewa = $request->harga_sewa;
    
            $total_harga = $request->harga_sewa * $request->lama_sewa;

            $sewa->total_harga = $total_harga;
            $sewa->save();


            return response()->json([
                'status' => '1',
                'pesan' => 'Total harga sewa : ' . ($total_harga),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => '0',
                'pesan' => $request->nama_peminjam,
            ]);

        }
    }
}
