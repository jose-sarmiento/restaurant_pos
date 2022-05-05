<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [ 
                'name' => 'Fettucine Alfredo', 
                'image' => '/images/fettucine-alfredo.jpg', 
                'price' => 299, 
                'qty_available' => 10,  
            ],
            [ 
                'name' => 'Slow Cooker Hamburger Soup', 
                'image' => '/images/slow-cooker-hamburger-soup.jpg', 
                'price' => 499, 
                'qty_available' => 22, 
            ],
            [ 
                'name' => 'Skillet Mac and Cheese', 
                'image' => '/images/skillet-mac-and-cheese.jpg', 
                'price' => 350, 
                'qty_available' => 18, 
            ],
            [ 
                'name' => 'Chicken Tetrazzini', 
                'image' => '/images/chicken-tetrazzini.jpg', 
                'price' => 400, 
                'qty_available' => 20, 
            ],
            [ 
                'name' => 'Crockpot Taco Soup', 
                'image' => '/images/crockpot-taco-soup.jpg', 
                'price' => 399, 
                'qty_available' => 30, 
            ],
            [ 
                'name' => 'Pizza', 
                'image' => '/images/pizza.jpg', 
                'price' => 249, 
                'qty_available' => 16, 
            ],
            [ 
                'name' => 'Seafood and Sausage Jambalaya', 
                'image' => '/images/seafood-and-sausage-jambalaya.jpg', 
                'price' => 350, 
                'qty_available' => 17, 
            ],
            [ 
                'name' => 'Irish Meal in a Bowl', 
                'image' => '/images/irish-meal-in-a-bowl.jpg', 
                'price' => 222, 
                'qty_available' => 10, 
            ],
            [ 
                'name' => 'Easy Beefy Cheesy Enchiladas', 
                'image' => '/images/easy-beefy-cheesy-enchiladas.jpg', 
                'price' => 350, 
                'qty_available' => 17, 
            ],
            [ 
                'name' => 'Chicken and Dumplings', 
                'image' => '/images/chicken-and-dumplings.jpg', 
                'price' => 222, 
                'qty_available' => 16, 
            ],
            [ 
                'name' => 'Chicken Marsala Soup', 
                'image' => '/images/chicken-marsala-soup.jpg', 
                'price' => 350, 
                'qty_available' => 17, 
            ],
            [ 
                'name' => 'Chicken Pot Pie', 
                'image' => '/images/chicken-pot-pie.jpg', 
                'price' => 322, 
                'qty_available' => 10, 
            ],
            [ 
                'name' => 'Slow Cooker Tomato Soup with Tortellini and Goat Cheese', 
                'image' => '/images/tomato-soup-with-tortellini.jpg', 
                'price' => 222, 
                'qty_available' => 16, 
            ],
            [ 
                'name' => 'Salisbury Steak with Mushroom Gravy', 
                'image' => '/images/salisbury-steak.jpg', 
                'price' => 350, 
                'qty_available' => 17, 
            ],
            [ 
                'name' => 'Skinny Chicken Salad', 
                'image' => '/images/skinny-chicken-salad.jpg', 
                'price' => 322, 
                'qty_available' => 10, 
            ],
            [ 
                'name' => 'Salad-Stuffed Avocado', 
                'image' => '/images/salad-stuffed-avocado.jpg', 
                'price' => 222, 
                'qty_available' => 18, 
            ],
            [ 
                'name' => 'Whole Wheat Pita with Kale and Asiago', 
                'image' => '/images/whole-wheat-pita.jpg', 
                'price' => 223, 
                'qty_available' => 25, 
            ],
            [ 
                'name' => 'Crab Salad', 
                'image' => '/images/crab-salad.jpg', 
                'price' => 363, 
                'qty_available' => 24, 
            ],
            [ 
                'name' => 'Greek Chicken Roll Salad', 
                'image' => '/images/greek-chicken-roll-salad.jpg', 
                'price' => 226, 
                'qty_available' => 28, 
            ],
            [ 
                'name' => 'Watermelon and Feta Salad', 
                'image' => '/images/watermelon-and-feta-salad.jpg', 
                'price' => 363, 
                'qty_available' => 21, 
            ],
            [ 
                'name' => 'Caesar Gazpacho', 
                'image' => '/images/caesar-gazpacho.jpg', 
                'price' => 223, 
                'qty_available' => 25, 
            ],
            [ 
                'name' => 'Mango Basil Bruschetta', 
                'image' => '/images/mango-basil-bruschetta.jpg', 
                'price' => 363, 
                'qty_available' => 24, 
            ],
            [ 
                'name' => 'Apple and Blue Cheese on Endive', 
                'image' => '/images/apple-and-blue-cheese-on-endive.jpg', 
                'price' => 363, 
                'qty_available' => 21, 
            ],
            [ 
                'name' => 'Eggs and Bacon Cucumber Salad', 
                'image' => '/images/eggs-and-bacon-cucumber-salad.jpg', 
                'price' => 223, 
                'qty_available' => 25, 
            ],
            [ 
                'name' => 'Smoked Salmon Pizza', 
                'image' => '/images/smoked-salmon-pizza.jpg', 
                'price' => 363, 
                'qty_available' => 24, 
            ],
            [ 
                'name' => 'Spring Rolls with Crispy Tofu', 
                'image' => '/images/spring-rolls-with-crispy-tofu.jpg', 
                'price' => 363, 
                'qty_available' => 21, 
            ],
            [ 
                'name' => 'Peach Sorbet', 
                'image' => '/images/peach-sorbet.jpg', 
                'price' => 223, 
                'qty_available' => 25, 
            ],
            [ 
                'name' => 'Yogurt Breakfast Popsicles', 
                'image' => '/images/yogurt-breakfast-popsicles.jpg', 
                'price' => 363, 
                'qty_available' => 24, 
            ],
            [ 
                'name' => 'Shrimp Roll', 
                'image' => '/images/shrimp-roll.jpg', 
                'price' => 363, 
                'qty_available' => 21, 
            ]
        ]);
    }
}
