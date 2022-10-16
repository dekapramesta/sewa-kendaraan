<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'merk'          => 'Mio',
                'jenis'             => 'Montor',
                'terakhirService' => Carbon::now(),
                'gapService' => 90,
                'status' => 1
            ], [
                'merk'          => 'Beat',
                'jenis'             => 'Montor',
                'terakhirService' => Carbon::now(),
                'gapService' => 90,
                'status' => 0
            ], [
                'merk'          => 'Avanza',
                'jenis'             => 'Mobil',
                'terakhirService' => Carbon::now(),
                'gapService' => 90,
                'status' => 1
            ]
        ];
        foreach ($data as $dt) {
            $user = Kendaraan::create($dt);
            $user->save();
        }
    }
}
