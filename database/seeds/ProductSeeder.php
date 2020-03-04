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

            // Remove and re add the foreign key checks to clear the table id incerment
            if (DB::connection()->getDatabaseName() == 'curey_db'){
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                // Reset the id counting and clears the table
                DB::table('products')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
            else {
                DB::statement('TRUNCATE products RESTART IDENTITY CASCADE;');
            }
        }

        for ($i = 0; $i < 100; $i++) {
            factory(Product::class)->create();
        }

        $this->command->info('    ---------------------------------------');
        $this->command->info('       Products table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
