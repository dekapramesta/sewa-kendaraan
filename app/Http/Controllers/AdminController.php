<?php

namespace App\Http\Controllers;

use App\Exports\SewaExport;
use App\Models\DetailSewa;
use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\KonsumsiBBM;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    //
    public function index()
    {
        # code...


        $data = DetailSewa::get()
            ->groupBy(function ($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->tanggalSewa)->format('m'); // grouping by months
            });
        $datacount = [];
        $dataReal = [];
        foreach ($data as $key => $value) {
            $datacount[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($datacount[$i])) {
                $dataReal[$i] = $datacount[$i];
            } else {
                $dataReal[$i] = 0;
            }
        }
        // dd($dataReal);
        // dd($dataReal);
        return view('admin.dashboard', compact('dataReal'));
    }
    public function pemesanan()
    {
        # code...
        $driver = Driver::all();
        $kendaraan = Kendaraan::all();
        $data = DetailSewa::all();
        return view('admin.pemesanan', compact('driver', 'kendaraan', 'data'));
    }
    public function savePemesanan(Request $request)
    {
        # code...
        DetailSewa::create([
            'idDriver' => $request->driver,
            'idKendaraan' => $request->kendaraan,
            'tanggalSewa' => $request->tanggalSewa,
            'bbm' => $request->bbm,
            'status' => 0
        ]);
        return redirect()->back();
    }
    public function selesai(Request $request)
    {
        # code...
        $data = DetailSewa::find($request->id);
        $data->status = 7;
        $kendaraan = Kendaraan::find($data->idKendaraan);
        $kendaraan->status = 0;
        $kendaraan->save();
        $data->save();
    }
    public function export()
    {
        return Excel::download(new SewaExport, 'sewa.xlsx');
    }
}
