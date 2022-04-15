<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [ 'category' => 'hot dishes' ],
            [ 'category' => 'cold dishes' ],
            [ 'category' => 'salad' ],
            [ 'category' => 'pizza' ],
            [ 'category' => 'soup' ],
            [ 'category' => 'appetizer' ],
            [ 'category' => 'dessert' ]
        ]);
    }
}
