<?php

namespace Database\Seeders;

use App\Models\Customer;
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
        Customer::factory()->count(20)->create();
        
        $this->call([
            CategorySeeder::class,
            MenuSeeder::class,
            CategoryMenuSeeder::class
        ]);
    }
}
