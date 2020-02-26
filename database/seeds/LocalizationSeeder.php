<?php

use Illuminate\Database\Seeder;

class LocalizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First, check the localization table for content
        if (DB::table('localization')->get()->count() != 0) {

            // Reset the id counting and clears the table
            DB::table('localization')->truncate();
        }

        // Insert the data
        DB::table('localization')->insert([

            // LANDING 1
            [
                'app' => 'c',
                'key' => 'onboard1_main',
                'en' => 'The Best Doctors',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'onboard1_para',
                'en' => 'Whether it’s booking doctor appointments, ordering medications, scheduling diagnostic tests or having an online consultation with your doctor',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'next',
                'en' => 'Next',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'skip',
                'en' => 'Skip',
                'ar' => ''
            ],

            // LANDING 2
            [
                'app' => 'c',
                'key' => 'onboard2_main',
                'en' => 'Find your Medicine',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'onboard2_para',
                'en' => 'Whether it’s booking doctor appointments, ordering medications, scheduling diagnostic tests or having an online consultation with your doctor',
                'ar' => ''
            ],

            // LANDING 3
            [
                'app' => 'c',
                'key' => 'onboard3_main',
                'en' => 'All-in-one-App',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'onboard3_para',
                'en' => 'Whether it’s booking doctor appointments, ordering medications, scheduling diagnostic tests or having an online consultation with your doctor',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'signup',
                'en' => 'Sign Up',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'signin',
                'en' => 'Sign In',
                'ar' => ''
            ],

            // LOGIN
            [
                'app' => 'c',
                'key' => 'wel',
                'en' => 'Welcome Back!',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'sign_account',
                'en' => 'Sign in to your account',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'email_phone',
                'en' => 'Email Address or Phone Number',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'e_email_phone',
                'en' => 'enter your email or phone number',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'u_pass',
                'en' => 'Your Password',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'e_pass',
                'en' => 'Enter your password',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'f_pass',
                'en' => 'Forgot Password?',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'dont_have',
                'en' => 'Don’t have an account?',
                'ar' => ''
            ],

            // SIGN UP
            [
                'app' => 'c',
                'key' => 'full_name',
                'en' => 'Full Name',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'u_name',
                'en' => 'Your name',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'email',
                'en' => 'Email',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'u_email',
                'en' => 'Your email',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'city',
                'en' => 'City',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'pass',
                'en' => 'Password',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'w_pass',
                'en' => 'Write Your password',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'c_pass',
                'en' => 'Confirm Password',
                'ar' => ''
            ],
            [
                'app' => 'c',
                'key' => 'have_acc',
                'en' => 'Already have an account?',
                'ar' => ''
            ],

            // HOME
            [
                'app' => 'c',
                'key' => 'home',
                'en' => 'Home',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'need_help',
                'en' => 'Do You Need Help?',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'find_dm',
                'en' => 'Find your Doctor & Medicine?',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'search_dm',
                'en' => 'Search doctor/medication',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'medicine',
                'en' => 'MEDICATIONS',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'doctor',
                'en' => 'DOCTORS',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'appointments',
                'en' => 'Appointments',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'prescription',
                'en' => 'Prescription',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'orders',
                'en' => 'Orders',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'notifications',
                'en' => 'Notifications',
                'ar' => ''
            ],

            // DOCTOR PROFILE
            [
                'app' => '1',
                'key' => 'reviews',
                'en' => 'Reviews',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'book_now',
                'en' => 'Book now',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'home_visit',
                'en' => 'Home Visit',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'booking',
                'en' => 'Booking',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'biography',
                'en' => 'Biography',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'degrees',
                'en' => 'Degrees',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'profile',
                'en' => 'Profile',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'contact_info',
                'en' => 'Contact info',
                'ar' => ''
            ],

            // DOCTORS
            [
                'app' => '1',
                'key' => 'doctors',
                'en' => 'Doctors',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'search_doctors',
                'en' => 'Search Doctors',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'book',
                'en' => 'Book',
                'ar' => ''
            ],
            
            // MEDICATIONS
            [
                'app' => '1',
                'key' => 'medications',
                'en' => 'Medications',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'search_medications',
                'en' => 'Search Medications',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'buy_now',
                'en' => 'Buy now',
                'ar' => ''
            ],

            // MEDICATION PAGE
            [
                'app' => '1',
                'key' => 'delivery_cost',
                'en' => 'Delivery Cost',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'based_address',
                'en' => 'Based on your address',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'change_address',
                'en' => 'Change Address',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'pharmacies_list',
                'en' => 'Pharmacies list',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'order',
                'en' => 'Order',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'add_cart',
                'en' => 'Add to cart',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'reviews',
                'en' => 'Reviews',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'le',
                'en' => 'LE',
                'ar' => ''
            ],

            // APPOINTMENTS
            [
                'app' => '1',
                'key' => 'all',
                'en' => 'All',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'booking',
                'en' => 'Booking',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'call_up',
                'en' => 'Call up',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 're_exam',
                'en' => 'Re-Examination',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'booking',
                'en' => 'Booking',
                'ar' => ''
            ],

            // NOTIFICATIONS
            [
                'app' => '1',
                'key' => 'sent_you',
                'en' => 'sent you a',
                'ar' => ''
            ],
            [
                'app' => '1',
                'key' => 'prescription',
                'en' => 'prescription',
                'ar' => ''
            ]

            // END OF LOCALIZATION
        ]);

        $this->command->info('    ---------------------------------------');
        $this->command->info('     Localization table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
