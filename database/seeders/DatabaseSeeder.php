<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory()->count(200)->create();
        
        $this->call([
            CategorySeeder::class,
            MenuSeeder::class,
            CategoryMenuSeeder::class
        ]);

        Order::factory()->count(500)->create();
    }
}
