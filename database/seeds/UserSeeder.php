<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

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

            // Reset the id counting and clears the table
            // Remove and re add the foreign key checks to clear the table id incerment
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('users')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        // Number of rows to be added
        $count = 100;
        factory(User::class, $count)->create();

        $this->command->info('    ---------------------------------------');
        $this->command->info('         User table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
