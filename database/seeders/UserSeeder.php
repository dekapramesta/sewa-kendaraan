<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'email'          => 'admin@gmail.com',
                'password'          => Hash::make('admin'),
                'level'             => 1,
            ], [
                'email'          => 'deka@gmail.com',
                'password'          => Hash::make('deka'),
                'level'             => 2,
            ],
        ];
        foreach ($data as $dt) {
            $user = User::create($dt);
            $user->save();
        }
    }
}
