<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Заполнение товаров
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => str_random(10),
            'article' => 'A_' . str_random(10)
        ]);
    }
}
