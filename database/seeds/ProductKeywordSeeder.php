<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Product;
use App\Keyword;
use App\ProductKeyword;

class ProductKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //  First, check the products_keywords table for content
        if (DB::table('products_keywords')->get()->count() != 0) {

            // Remove and re add the foreign key checks to clear the table id incerment
            if (DB::connection()->getDatabaseName() == 'curey_db'){
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                // Reset the id counting and clears the table
                DB::table('products_keywords')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
            else {
                DB::statement('TRUNCATE products_keywords RESTART IDENTITY CASCADE;');
            }
        }

        //  Remove the foreign key checks to change the IDs
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        //  Change the i for numbers of rows generated
        for ($i = 0; $i < 300; $i++) {
            
            //  Assign random IDs in every iteration
            $product = DB::table('products')->inRandomOrder()->first() -> id;
            $keyword = DB::table('keywords')->inRandomOrder()->first() -> id;

            //  Check if the product ID exists in the database alongside with the keyword ID, if not, adds the record
            if (ProductKeyword::where(['product_id' => $product, 'keyword_id' => $keyword])->count() == 0){
                factory(ProductKeyword::class)->create([
                    'product_id' => $product,
                    'keyword_id' => $keyword
                ]);
            }
            // If exists, minus 1 from the counter - restart this iteration -
            else { $i--; }
        }

        // Re add the foreign key checks
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        $this->command->info('    ---------------------------------------');
        $this->command->info('   Products_Keywords table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
    
}
