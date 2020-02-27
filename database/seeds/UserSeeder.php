<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\UserRole;
use App\Gender;
use App\City;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First, check the localization table for content
        if (DB::table('users')->get()->count() != 0) {

            // Remove and re add the foreign key checks to clear the table id incerment
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            // Reset the id counting and clears the table
            DB::table('users')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        // Get IDs available in database
        $roles = UserRole::select('id')->get()->toArray();
        $genders = Gender::select('id')->get()->toArray();
        $cities = City::select('id')->get()->toArray();

        // Remove the foreign key checks to change the IDs
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Change the second number to change number of users created
        foreach(range(1,100) as $index) {
            factory(User::class)->create([

                // Assign random IDs in every iteration
                'role_id' => array_rand($roles)+1,
                'gender_id' => array_rand($genders)+1,
                'city_id' => array_rand($cities)+1
            ]);
        }
        
        // Re add the foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('    ---------------------------------------');
        $this->command->info('         User table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
