<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Product;
use App\Pharmacy;
use App\ProductPharmacy;

class ProductPharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //  First, check the products_pharmacies table for content
        if (DB::table('products_pharmacies')->get()->count() != 0) {

            // Remove and re add the foreign key checks to clear the table id incerment
            if (DB::connection()->getDatabaseName() == 'curey_db'){
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                // Reset the id counting and clears the table
                DB::table('products_pharmacies')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
            else {
                DB::statement('TRUNCATE products_pharmacies RESTART IDENTITY CASCADE;');
            }
        }

        //  Remove the foreign key checks to change the IDs
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        //  Change the i for numbers of rows generated
        for ($i = 0; $i < 100; $i++) {
            
            //  Assign random IDs in every iteration
            $product = DB::table('products')->inRandomOrder()->first() -> id;
            $pharmacy = DB::table('pharmacies')->inRandomOrder()->first() -> id;

            //  Check if the product ID exists in the database, if not, adds the record
            if (ProductPharmacy::where('product_id', $product)->count() == 0){
                factory(ProductPharmacy::class)->create([
                    'product_id' => $product,
                    'pharmacy_id' => $pharmacy
                ]);
            }

            /*  If the product exists, checks for the current pharmacy if it's associated with the current product, 
            preventing duplications.
                And if it exists, we minus 1 from the counter and continue through the loop. */
            else {
                if (ProductPharmacy::where('pharmacy_id', $pharmacy)->count() == 0){
                    factory(ProductPharmacy::class)->create([
                        'product_id' => $product,
                        'pharmacy_id' => $pharmacy
                    ]);
                }
                else {
                    $i--;
                }
            }
        }

        // Re add the foreign key checks
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        $this->command->info('    ---------------------------------------');
        $this->command->info('  Products_Pharmacies table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
    
}
