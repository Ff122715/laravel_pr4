<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            [
                'name' => 'Императорский фарфоровый завод',
                'country_id' => 1
            ],
            [
                'name' => 'Coalport',
                'country_id' => 2
            ],
            [
                'name' => 'Winstanley',
                'country_id' => 2
            ],
            [
                'name' => 'Дулёвский фарфоровый завод',
                'country_id' => 1
            ],
            [
                'name' => 'Ленинградский фарфоровый завод',
                'country_id' => 1
            ],
            [
                'name' => 'Little Critterz',
                'country_id' => 3
            ],
        ]);
    }
}
