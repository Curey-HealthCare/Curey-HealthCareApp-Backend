<?php

use Illuminate\Database\Seeder;
use App\Day;
use App\UserRole;
use App\City;
use App\Speciality;
use App\Keyword;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDatabaseName() == 'curey_db'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('genders')->truncate();
            DB::table('days')->truncate();
            DB::table('user_roles')->truncate();
            DB::table('cities')->truncate();
            DB::table('specialities')->truncate();
            DB::table('keywords')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
        // else {
        //     DB::statement('ALTER TABLE days DISABLE TRIGGER USER;');
        //     DB::statement('ALTER TABLE user_roles DISABLE TRIGGER USER;');
        //     DB::statement('ALTER TABLE cities DISABLE TRIGGER USER;');
        //     DB::statement('ALTER TABLE specialities DISABLE TRIGGER USER;');
        //     DB::statement('ALTER TABLE keywords DISABLE TRIGGER USER;');
        //     DB::table('days')->truncate();
        //     DB::table('user_roles')->truncate();
        //     DB::table('cities')->truncate();
        //     DB::table('specialities')->truncate();
        //     DB::table('keywords')->truncate();
        //     DB::statement('ALTER TABLE days ENABLE TRIGGER ALL;');
        //     DB::statement('ALTER TABLE user_roles ENABLE TRIGGER ALL;');
        //     DB::statement('ALTER TABLE cities ENABLE TRIGGER ALL;');
        //     DB::statement('ALTER TABLE specialities ENABLE TRIGGER ALL;');
        //     DB::statement('ALTER TABLE keywords ENABLE TRIGGER ALL;');
        // }
        if (DB::table('genders')->get()->count() == 0){
            DB::table('genders')->insert([
                ['id' => '1', 'name' => 'Male', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '2', 'name' => 'Female', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '3', 'name' => 'Prefer not to say', 'created_at' => NULL, 'updated_at' => NULL]
            ]);
        }
        if (DB::table('days')->get()->count() == 0){
            DB::table('days')->insert([
                ['id' => '1', 'name' => 'Saturday', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '2', 'name' => 'Sunday', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '3', 'name' => 'Monday', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '4', 'name' => 'Tuesday', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '5', 'name' => 'Wednesday', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '6', 'name' => 'Thursday', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '7', 'name' => 'Friday', 'created_at' => NULL, 'updated_at' => NULL]
            ]);
        }
        if (DB::table('user_roles')->get()->count() == 0){
            DB::table('user_roles')->insert([
                ['id' => '1', 'name' => 'Customer', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '2', 'name' => 'Pharmacy', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '3', 'name' => 'Doctor', 'created_at' => NULL, 'updated_at' => NULL],
            ]);
        }
        if (DB::table('cities')->get()->count() == 0){
            DB::table('cities')->insert([
                ['id' => '1', 'name' => 'Mansoura', 'delivery_fees' => '10', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '2', 'name' => 'Cairo', 'delivery_fees' => '10', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '3', 'name' => 'Alexandria', 'delivery_fees' => '10', 'created_at' => NULL, 'updated_at' => NULL]
            ]);
        }
        if (DB::table('specialities')->get()->count() == 0){
            DB::table('specialities')->insert([
                ['id' => '1', 'name' => 'Brain Surgeon', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '2', 'name' => 'Therapist', 'created_at' => NULL, 'updated_at' => NULL]
            ]);
        }
        if (DB::table('keywords')->get()->count() == 0){
            DB::table('keywords')->insert([
                ['id' => '1', 'name' => 'Pills', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '2', 'name' => 'Syrup', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '3', 'name' => 'Injection', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '4', 'name' => 'Headache', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '5', 'name' => 'Diabetes', 'created_at' => NULL, 'updated_at' => NULL],
                ['id' => '6', 'name' => 'Capsules', 'created_at' => NULL, 'updated_at' => NULL]
            ]);
        }
        $this->call(LocalizationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(PharmacySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TimeTableSeeder::class);
        $this->call(ProductPharmacySeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(DoctorRatingSeeder::class);
        $this->call(ProductKeywordSeeder::class);
    }
}
