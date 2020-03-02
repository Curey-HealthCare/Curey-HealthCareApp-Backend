<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\UserRole;
use App\Gender;
use App\City;
use Illuminate\Database\QueryException;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First, check the users table for content
        if (DB::table('users')->get()->count() != 0) {
            // Remove and re add the foreign key checks to clear the table id incerment
            if (DB::connection()->getDatabaseName() == 'curey_db'){
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                // Reset the id counting and clears the table
                DB::table('users')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
            else {
                DB::statement('TRUNCATE users RESTART IDENTITY CASCADE;');
            }
        }

        // Remove the foreign key checks to change the IDs
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        // Change the second i to change number of users created
        for ($i = 0; $i < 50; $i++) {
            factory(User::class)->create([

                // Assign random IDs in every iteration
                'role_id' => DB::table('user_roles')->inRandomOrder()->first() -> id,
                'gender_id' => DB::table('genders')->inRandomOrder()->first() -> id,
                'city_id' => DB::table('cities')->inRandomOrder()->first() -> id
            ]);
        }
        
        // Re add the foreign key checks
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        $this->command->info('    ---------------------------------------');
        $this->command->info('        Users table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
