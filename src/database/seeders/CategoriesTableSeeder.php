<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pram=[
            'content'=>'商品のお届けについて'
        ];
        DB::table('categories')->insert($pram);

        $pram=[
            'content'=>'商品の交換について'
        ];
         DB::table('categories')->insert($pram);

         $pram=[
            'content'=>'商品トラブル'
         ];
        DB::table('categories')->insert($pram);

        $pram=[
            'content'=>'ショップへのお問い合わせ'
        ];
        DB::table('categories')->insert($pram);

        $pram=[
            'content'=>'その他'
        ];
        DB::table('categories')->insert($pram);

    }
}
