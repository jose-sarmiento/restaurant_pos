<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategoryMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('category_menu')->insert([
            [ 
                'category_id' => 1, 
                'menu_id' => 1
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 2
            ],
            [ 
                'category_id' => 5, 
                'menu_id' => 2
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 3
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 4
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 5
            ],
            [ 
                'category_id' => 5, 
                'menu_id' => 5
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 6
            ],
            [ 
                'category_id' => 4, 
                'menu_id' => 6
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 7
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 8
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 9
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 10
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 11
            ],
            [ 
                'category_id' => 5, 
                'menu_id' => 11
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 12
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 13
            ],
            [ 
                'category_id' => 5, 
                'menu_id' => 13
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 14
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 15
            ],
            [ 
                'category_id' => 3, 
                'menu_id' => 15
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 16
            ],
            [ 
                'category_id' => 3, 
                'menu_id' => 16
            ],
            [ 
                'category_id' => 1, 
                'menu_id' => 17
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 18
            ],
            [ 
                'category_id' => 3, 
                'menu_id' => 18
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 19
            ],
            [ 
                'category_id' => 3, 
                'menu_id' => 19
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 20
            ],
            [ 
                'category_id' => 3, 
                'menu_id' => 20
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 21
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 22
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 23
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 24
            ],
            [ 
                'category_id' => 3, 
                'menu_id' => 24
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 25
            ],
            [ 
                'category_id' => 4, 
                'menu_id' => 25
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 26
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 27
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 28
            ],
            [ 
                'category_id' => 2, 
                'menu_id' => 29
            ],
        ]);
    }
}
