<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\Doctor;
use App\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  First, check the appointments table for content
        if (DB::table('appointments')->get()->count() != 0) {

            // Remove and re add the foreign key checks to clear the table id incerment
            if (DB::connection()->getDatabaseName() == 'curey_db'){
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                // Reset the id counting and clears the table
                DB::table('appointments')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
            else {
                DB::statement('TRUNCATE appointments RESTART IDENTITY CASCADE;');
            }
        }

        //  Remove the foreign key checks to change the IDs
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        //  Change the i for numbers of rows generated
        for ($i = 0; $i < 100; $i++) {
            
            //  Assign random IDs in every iteration
            $user = DB::table('users')->inRandomOrder()->where('role_id', 1)->first() -> id;
            $doctor = DB::table('doctors')->inRandomOrder()->first() -> id;

            //  Check if the user ID exists in the database alongside with the doctor ID, if not, adds the record
            if (Appointment::where(['user_id' => $user, 'doctor_id' => $doctor])->count() == 0){
                factory(Appointment::class)->create([
                    'user_id' => $user,
                    'doctor_id' => $doctor
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
        $this->command->info('     Appointments table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');

    }
}
