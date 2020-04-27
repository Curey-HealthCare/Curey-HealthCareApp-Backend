<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\Doctor;
use App\Appointment;
use App\Day;
use App\TimeTable;
use Carbon\Carbon;

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
        for ($j = 0; $j < 300; $j++) {
            
            //  Assign random IDs in every iteration
            $user = DB::table('users')->inRandomOrder()->where('role_id', 1)->first() -> id;
            $doctor = DB::table('doctors')->inRandomOrder()->first();
            $timetable = DB::table('timetables')->where(['user_id' => $doctor -> user_id])->inRandomOrder()->first();

            // Before doing anything, check if the timetable for the doctor exists, if not, reset the iteration
            if ($timetable == []){
                $j--;
                continue;
            }

            // Get timetable day, from, to
            $timetable_day = Day::where(['id' => $timetable -> day_id])->first() -> name;
            $timetable_from = Carbon::parse( $timetable -> from);
            $timetable_to = Carbon::parse( $timetable -> to);

            // Calculate the no. of appointments per day
            $appointments_no = $timetable_to->diffInHours($timetable_from);

            // Start of the time for the appointment
            $time = Carbon::yesterday()->next($timetable_day)->addHours($timetable_from -> hour);

            // Iterate through the appointments, adding the record
            for ($i = 0; $i < $appointments_no; $i++){
                //  Check if the doctor ID exists in the database alongside with the time specified, if not, adds the record
                if (Appointment::where(['doctor_id' => $doctor  -> id, 'appointment_time' => $time])->count() == 0){
                    factory(Appointment::class)->create([
                        'user_id' => $user,
                        'doctor_id' => $doctor  -> id,
                        'appointment_time' => $time
                    ]);
                    break;
                } 
                // If exists, increase the time by 1 hour, or 1 day if already reached the end of the day
                else {
                    if ($i == $appointments_no-1){
                        $time->next($timetable_day)->addHours($timetable_from -> hour);
                        $i = 0;
                    } else {
                        $time->addMinutes($doctor -> duration);
                    }
                }
            }
            
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
