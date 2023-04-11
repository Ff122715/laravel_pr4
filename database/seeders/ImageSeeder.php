<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            // чайка
            [
                'img' => 'http://127.0.0.1:8000/storage/products/1_chaika_1.jpg',
                'product_id' => 1,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/1_chaika_2.jpg',
                'product_id' => 1,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/1_chaika_3.jpg',
                'product_id' => 1,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/1_chaika_4.jpg',
                'product_id' => 1,
            ],

            // мыш
            [
                'img' => 'http://127.0.0.1:8000/storage/products/2_mouse_1.png',
                'product_id' => 2,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/3_girl_in_green_1.jfif',
                'product_id' => 3,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/3_girl_in_green_2.jfif',
                'product_id' => 3,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/3_girl_in_green_3.jfif',
                'product_id' => 3,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/3_girl_in_green_4.jfif',
                'product_id' => 3,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/3_girl_in_green_5.jfif',
                'product_id' => 3,
            ],

            // кот
            [
                'img' => 'http://127.0.0.1:8000/storage/products/4_cat_1.jfif',
                'product_id' => 4,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/4_cat_2.jfif',
                'product_id' => 4,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/4_cat_3.jfif',
                'product_id' => 4,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/4_cat_4.jfif',
                'product_id' => 4,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/5_plyaska_girl_pink_1.jpg',
                'product_id' => 5,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/5_plyaska_girl_pink_2.jpg',
                'product_id' => 5,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/5_plyaska_girl_pink_3.jpg',
                'product_id' => 5,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/5_plyaska_girl_pink_4.jpg',
                'product_id' => 5,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/6_yarmarka_girl_green_1.jpg',
                'product_id' => 6,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/6_yarmarka_girl_green_2.jpg',
                'product_id' => 6,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/6_yarmarka_girl_green_3.jpg',
                'product_id' => 6,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/6_yarmarka_girl_green_4.jpg',
                'product_id' => 6,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/6_yarmarka_girl_green_5.jpg',
                'product_id' => 6,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/7_yezhik_1.png',
                'product_id' => 7,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/7_yezhik_2.png',
                'product_id' => 7,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/8_wren_1.jpg',
                'product_id' => 8,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/8_wren_2.jpg',
                'product_id' => 8,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/8_wren_3.jpg',
                'product_id' => 8,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/8_wren_4.jpg',
                'product_id' => 8,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/9_tiger_1.png',
                'product_id' => 9,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/9_tiger_2.png',
                'product_id' => 9,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/10_fox_1.jpg',
                'product_id' => 10,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/10_fox_2.jpg',
                'product_id' => 10,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/10_fox_3.jpg',
                'product_id' => 10,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/10_fox_4.jpg',
                'product_id' => 10,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/10_fox_5.jpg',
                'product_id' => 10,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/11_bunny_1.jpg',
                'product_id' => 11,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/11_bunny_2.jpg',
                'product_id' => 11,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/11_bunny_3.jpg',
                'product_id' => 11,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/11_bunny_4.jpg',
                'product_id' => 11,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/11_bunny_5.jpg',
                'product_id' => 11,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/12_gazel_1.jpg',
                'product_id' => 12,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/12_gazel_2.jpg',
                'product_id' => 12,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/12_gazel_3.jpg',
                'product_id' => 12,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/13_chich_1.png',
                'product_id' => 13,
            ],
            [
                'img' => 'http://127.0.0.1:8000/storage/products/13_chich_2.jpg',
                'product_id' => 13,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/14_bear_1.jpg',
                'product_id' => 14,
            ],

            //
            [
                'img' => 'http://127.0.0.1:8000/storage/products/15_kangaroo_1.png',
                'product_id' => 15,
            ],
        ]);
    }
}
