<?php

namespace App\Http\Controllers;

use App\Models\DetailSewa;
use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\KonsumsiBBM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyetujuContoller extends Controller
{
    //
    public function index()
    {
        # code...
        $data = Driver::where('idAtasan', Auth::user()->id)->get();
        return view('atasan.dashboard', compact('data'));
    }
    public function setuju(Request $request)
    {
        # code...

        $data = DetailSewa::find($request->id);
        $data->status = 1;
        if ($data->bbm > 0) {
            KonsumsiBBM::create([
                'idKendaraan' => $data->idKendaraan,
                'bbm' => $data->bbm,
                'tanggalPengisian' => $data->tanggalSewa
            ]);
        }
        $kendaraan = Kendaraan::find($data->idKendaraan);
        $kendaraan->status = 1;
        $kendaraan->save();
        $data->save();

        return response()->json($request);
    }
}
