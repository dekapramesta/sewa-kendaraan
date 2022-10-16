<?php

namespace Database\Seeders;

use App\Models\DetailSewa;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSewaSeeder extends Seeder
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
                'idDriver'             => '1',
                'tanggalSewa' => Carbon::now(),
                'bbm' => 0,
                'status' => 0
            ],
            [
                'idKendaraan'          => '3',
                'idDriver'             => '2',
                'tanggalSewa' => Carbon::now(),
                'bbm' => 0,
                'status' => 1
            ],


        ];
        foreach ($data as $dt) {
            $user = DetailSewa::create($dt);
            $user->save();
        }
    }
}
