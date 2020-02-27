<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First, check the products table for content
        if (DB::table('products')->get()->count() != 0) {

            // Reset the id counting and clears the table
            // Remove and re add the foreign key checks to clear the table id incerment
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('products')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        for ($i = 0; $i < 100; $i++) {
            factory(Product::class)->create();
        }

        $this->command->info('    ---------------------------------------');
        $this->command->info('       Products table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
