<?php

namespace App\Exports;

use App\Models\DetailSewa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SewaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data =  DetailSewa::all();
        $array = array();
        foreach ($data as $dt) {
            array_push($array, ['Nama' => $dt->getDriver->nama, 'Kendaraan' => $dt->getKendaraan->merk, 'Tanggal' => $dt->tanggalSewa]);
        }
        return collect($array);
    }
    public function headings(): array
    {
        return ["Nama", "Kendaraan", "Tanggal"];
    }
}
