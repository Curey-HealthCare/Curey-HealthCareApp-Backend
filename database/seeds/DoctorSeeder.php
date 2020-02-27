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

            // Reset the id counting and clears the table
            // Remove and re add the foreign key checks to clear the table id incerment
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('doctors')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        // Check for doctors in users
        $doctors = User::where('role_id', '3')->get();

        // Get IDs available in database
        $specialities = Speciality::get()->toArray();

        // Remove the foreign key checks to change the IDs
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Then passes the IDs of them to the create factory, the rest is added through it
        foreach ($doctors as $doctor){
            factory(Doctor::class)->create([
                'user_id' => $doctor -> id,
                'speciality_id' => $specialities[array_rand($specialities)]['id']
            ]);
        }
        
        // Re add the foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('    ---------------------------------------');
        $this->command->info('       Doctors table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
