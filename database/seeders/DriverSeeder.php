<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
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
                'nama'          => 'Anam',
                'noPeg'             => 1127918729,
                'idAtasan' => 2
            ], [
                'nama'          => 'Mamad',
                'noPeg'             => 2127182896,
                'idAtasan' => 2

            ],
        ];
        foreach ($data as $dt) {
            $user = Driver::create($dt);
            $user->save();
        }
    }
}
