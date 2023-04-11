<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Delivery_pointSeeder extends Seeder
{
    public function run()
    {
        DB::table('delivery_points')->insert([
            [
                'address' => 'ул. Кирова, 19',
            ],
            [
                'address' => 'ул. Артиллерийская, 134',
            ],
        ]);
    }
}
