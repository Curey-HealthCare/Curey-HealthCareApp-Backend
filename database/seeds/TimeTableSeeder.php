<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\TimeTable;
use Carbon\Carbon;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  First, check the timetables table for content
        if (DB::table('timetables')->get()->count() != 0) {

            // Remove and re add the foreign key checks to clear the table id incerment
            if (DB::connection()->getDatabaseName() == 'curey_db'){
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                // Reset the id counting and clears the table
                DB::table('timetables')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
            else {
                DB::statement('TRUNCATE timetables RESTART IDENTITY CASCADE;');
            }
        }

        //  Remove the foreign key checks to change the IDs
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        //  Change the i for numbers of rows generated
        for ($i = 0; $i < 50; $i++) {
            
            //  Assign random IDs in every iteration
            $doctor = DB::table('users')->inRandomOrder()->where('role_id', 3)->first() -> id;
            $day = DB::table('days')->inRandomOrder()->first() -> id;
            $from = Carbon::createFromFormat('H:i:s', '12:00:00')->addHours( rand(1,6) );
            $to = Carbon::parse($from)->addHours( rand(3,6) );

            //  Check if the user ID exists in the database alongside with the day ID and from-to constraint, if not, adds the record
            if (TimeTable::where(['user_id' => $doctor, 'day_id' => $day, 'from' => $to])->count() == 0){
                factory(TimeTable::class)->create([
                    'user_id' => $doctor,
                    'day_id' => $day,
                    'from' => $from,
                    'to' => $to
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
        $this->command->info('      Timetables table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
