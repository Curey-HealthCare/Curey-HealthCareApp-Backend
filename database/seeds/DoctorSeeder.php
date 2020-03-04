<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Doctor;
use App\User;
use App\Speciality;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // First, check the doctors table for content
        if (DB::table('doctors')->get()->count() != 0) {

            // Remove and re add the foreign key checks to clear the table id incerment
            if (DB::connection()->getDatabaseName() == 'curey_db'){
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                // Reset the id counting and clears the table
                DB::table('doctors')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
            else {
                DB::statement('TRUNCATE doctors RESTART IDENTITY CASCADE;');
            }
        }

        // Check for doctors in users
        $doctors = User::where('role_id', '3')->get();

        // Remove the foreign key checks to change the IDs
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        // Then passes the IDs of them to the create factory, the rest is added through it
        foreach ($doctors as $doctor){
            factory(Doctor::class)->create([
                'user_id' => $doctor -> id,
                'speciality_id' => DB::table('specialities')->inRandomOrder()->first() -> id
            ]);
        }
        
        // Re add the foreign key checks
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        $this->command->info('    ---------------------------------------');
        $this->command->info('       Doctors table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
