<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Pharmacy;
use App\User;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First, check the localization table for content
        if (DB::table('pharmacies')->get()->count() != 0) {

            // Remove and re add the foreign key checks to clear the table id incerment
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            // Reset the id counting and clears the table
            DB::table('pharmacies')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        // Check for pharmacies in users
        $pharmacies = User::where('role_id', '2')->get();

        // Then passes the IDs of them to the create factory, the rest is added through it
        foreach ($pharmacies as $pharmacy){
            factory(Pharmacy::class)->create([
                'user_id' => $pharmacy -> id,
            ]);
        }
        

        $this->command->info('    ---------------------------------------');
        $this->command->info('      Pharmacies table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
