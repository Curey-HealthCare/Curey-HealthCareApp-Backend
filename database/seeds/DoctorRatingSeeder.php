<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\DoctorRating;
use App\Appointment;

class DoctorRatingSeeder extends Seeder
{   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    

    public function run()
    {
        // First, check the doctor_ratings table for content
        if (DB::table('doctor_ratings')->get()->count() != 0) {

            // Remove and re add the foreign key checks to clear the table id incerment
            if (DB::connection()->getDatabaseName() == 'curey_db'){
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                // Reset the id counting and clears the table
                DB::table('doctor_ratings')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
            else {
                DB::statement('TRUNCATE doctor_ratings RESTART IDENTITY CASCADE;');
            }
        }

        $appointments = Appointment::select('id')->get();
        

        // Remove the foreign key checks to change the IDs
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        for($i = 0; $i < $appointments->count(); $i++) {
            if (rand(0,1) == 1){
                factory(DoctorRating::class)->create([
                    'appointment_id' => $appointments[$i] -> id
                ]);
            }
        }

        // Re add the foreign key checks
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        $this->command->info('    ---------------------------------------');
        $this->command->info('    Doctor_ratings table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
