<?php

use App\Model\Admin;
use App\Model\Product;
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
         factory(Product::class,50)->create();
        // $this->call(UserSeeder::class);
    }
}
