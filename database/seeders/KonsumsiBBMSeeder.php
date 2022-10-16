<?php

namespace Database\Seeders;

use App\Models\KonsumsiBBM;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KonsumsiBBMSeeder extends Seeder
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
                'idKendaraan'          => '1',
                'bbm'             => '20000',
                'tanggalPengisian' => Carbon::now(),
            ],
            [
                'idKendaraan'          => '1',
                'bbm'             => '20000',
                'tanggalPengisian' => Carbon::now(),
            ],
        ];
        foreach ($data as $dt) {
            $user = KonsumsiBBM::create($dt);
            $user->save();
        }
    }
}
