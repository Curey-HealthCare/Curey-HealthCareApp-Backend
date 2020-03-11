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
                'ar' => 'افضل الأطباء'
            ],
            [
                'app' => 'c',
                'key' => 'onboard1_para',
                'en' => 'Whether it’s booking doctor appointments, ordering medications, scheduling diagnostic tests or having an online consultation with your doctor',
                'ar' => 'سواء كان حجز مواعيد الطبيب, أو طلب أدوية, أو جدولة الاختبارات التشخيصية, أو إجراء استشارة عبر الإنترنت مع طبيبك'
            ],
            [
                'app' => 'c',
                'key' => 'next',
                'en' => 'Next',
                'ar' => 'التالي'
            ],
            [
                'app' => 'c',
                'key' => 'skip',
                'en' => 'Skip',
                'ar' => 'تخطي'
            ],

            // LANDING 2
            [
                'app' => 'c',
                'key' => 'onboard2_main',
                'en' => 'Find your Medicine',
                'ar' => 'ابحث عن دوائك'
            ],
            [
                'app' => 'c',
                'key' => 'onboard2_para',
                'en' => 'Whether it’s booking doctor appointments, ordering medications, scheduling diagnostic tests or having an online consultation with your doctor',
                'ar' => 'سواء كان حجز مواعيد الطبيب, أو طلب أدوية, أو جدولة الاختبارات التشخيصية, أو إجراء استشارة عبر الإنترنت مع طبيبك'
            ],

            // LANDING 3
            [
                'app' => 'c',
                'key' => 'onboard3_main',
                'en' => 'All-in-one-App',
                'ar' => 'الكل في تطبيق واحد'
            ],
            [
                'app' => 'c',
                'key' => 'onboard3_para',
                'en' => 'Whether it’s booking doctor appointments, ordering medications, scheduling diagnostic tests or having an online consultation with your doctor',
                'ar' => 'سواء كان حجز مواعيد الطبيب, أو طلب أدوية, أو جدولة الاختبارات التشخيصية, أو إجراء استشارة عبر الإنترنت مع طبيبك'
            ],
            [
                'app' => 'c',
                'key' => 'signup',
                'en' => 'Sign Up',
                'ar' => 'انشاء حساب'
            ],
            [
                'app' => 'c',
                'key' => 'signin',
                'en' => 'Sign In',
                'ar' => 'تسجيل دخول'
            ],

            // LOGIN
            [
                'app' => 'c',
                'key' => 'wel',
                'en' => 'Welcome Back!',
                'ar' => 'مرحباََ بعودتك'
            ],
            [
                'app' => 'c',
                'key' => 'sign_account',
                'en' => 'Sign in to your account',
                'ar' => 'سجل الدخول الى حسابك'
            ],
            [
                'app' => 'c',
                'key' => 'email_phone',
                'en' => 'Email Address or Phone Number',
                'ar' => 'البريد الإلكتروني أو رقم الموبايل'
            ],
            [
                'app' => 'c',
                'key' => 'e_email_phone',
                'en' => 'enter your email or phone number',
                'ar' => 'ادخل بريدك الإلكتروني أو رقم الموبايل'
            ],
            [
                'app' => 'c',
                'key' => 'u_pass',
                'en' => 'Your Password',
                'ar' => 'كلمة السر الخاصة بك'
            ],
            [
                'app' => 'c',
                'key' => 'e_pass',
                'en' => 'Enter your password',
                'ar' => 'ادخل كلمة السر الخاصة بك'
            ],
            [
                'app' => 'c',
                'key' => 'f_pass',
                'en' => 'Forgot Password?',
                'ar' => 'نسيت كلمة السر'
            ],
            [
                'app' => 'c',
                'key' => 'dont_have',
                'en' => 'Don’t have an account?',
                'ar' => 'ليس لديك حساب؟'
            ],

            // SIGN UP
            [
                'app' => 'c',
                'key' => 'full_name',
                'en' => 'Full Name',
                'ar' => 'الإسم بالكامل'
            ],
            [
                'app' => 'c',
                'key' => 'u_name',
                'en' => 'Your name',
                'ar' => 'إسمك'
            ],
            [
                'app' => 'c',
                'key' => 'email',
                'en' => 'Email',
                'ar' => 'البريد الإلكتروني'
            ],
            [
                'app' => 'c',
                'key' => 'u_email',
                'en' => 'Your email',
                'ar' => 'بريدك الإلكتروني'
            ],
            [
                'app' => 'c',
                'key' => 'city',
                'en' => 'City',
                'ar' => 'المدينة'
            ],
            [
                'app' => 'c',
                'key' => 'pass',
                'en' => 'Password',
                'ar' => 'كلمة السر'
            ],
            [
                'app' => 'c',
                'key' => 'w_pass',
                'en' => 'Write Your password',
                'ar' => 'اكتب كلمة السر الخاصة بك'
            ],
            [
                'app' => 'c',
                'key' => 'c_pass',
                'en' => 'Confirm Password',
                'ar' => 'تأكيد كلمة السر'
            ],
            [
                'app' => 'c',
                'key' => 'have_acc',
                'en' => 'Already have an account?',
                'ar' => 'لديك حساب بالفعل؟'
            ],

            // HOME
            [
                'app' => 'c',
                'key' => 'home',
                'en' => 'Home',
                'ar' => 'الرئيسية'
            ],
            [
                'app' => '1',
                'key' => 'need_help',
                'en' => 'Do You Need Help?',
                'ar' => 'بحاجة الى مساعدة؟'
            ],
            [
                'app' => '1',
                'key' => 'find_dm',
                'en' => 'Find your Doctor & Medicine?',
                'ar' => 'ابحث عن طبيبك وعلاجك'
            ],
            [
                'app' => '1',
                'key' => 'search_dm',
                'en' => 'Search doctor/medication',
                'ar' => 'ابحث عن الطبيب/الدواء'
            ],
            [
                'app' => '1',
                'key' => 'medicine',
                'en' => 'MEDICATIONS',
                'ar' => 'الأدوية'
            ],
            [
                'app' => '1',
                'key' => 'doctor',
                'en' => 'DOCTORS',
                'ar' => 'الأطباء'
            ],
            [
                'app' => '1',
                'key' => 'appointments',
                'en' => 'Appointments',
                'ar' => 'المواعيد'
            ],
            [
                'app' => '1',
                'key' => 'prescription',
                'en' => 'Prescription',
                'ar' => 'الروشتات'
            ],
            [
                'app' => '1',
                'key' => 'orders',
                'en' => 'Orders',
                'ar' => 'الطلبات'
            ],
            [
                'app' => '1',
                'key' => 'notifications',
                'en' => 'Notifications',
                'ar' => 'الإشعارات'
            ],

            // DOCTOR PROFILE
            [
                'app' => '1',
                'key' => 'reviews',
                'en' => 'Reviews',
                'ar' => 'التعليقات'
            ],
            [
                'app' => '1',
                'key' => 'book_now',
                'en' => 'Book now',
                'ar' => 'احجز الآن'
            ],
            [
                'app' => '1',
                'key' => 'home_visit',
                'en' => 'Home Visit',
                'ar' => 'زيارة منزلية'
            ],
            [
                'app' => '1',
                'key' => 'booking',
                'en' => 'Booking',
                'ar' => 'حجز'
            ],
            [
                'app' => '1',
                'key' => 'biography',
                'en' => 'Biography',
                'ar' => 'السيرة الشخصية'
            ],
            [
                'app' => '1',
                'key' => 'degrees',
                'en' => 'Degrees',
                'ar' => 'الدرجات'
            ],
            [
                'app' => '1',
                'key' => 'profile',
                'en' => 'Profile',
                'ar' => 'الملف الشخصي'
            ],
            [
                'app' => '1',
                'key' => 'contact_info',
                'en' => 'Contact info',
                'ar' => 'بيانات التواصل'
            ],

            // DOCTORS
            [
                'app' => '1',
                'key' => 'doctors',
                'en' => 'Doctors',
                'ar' => 'الأطباء'
            ],
            [
                'app' => '1',
                'key' => 'search_doctors',
                'en' => 'Search Doctors',
                'ar' => 'البحث عن الأطباء'
            ],
            [
                'app' => '1',
                'key' => 'book',
                'en' => 'Book',
                'ar' => 'احجز'
            ],
            
            // MEDICATIONS
            [
                'app' => '1',
                'key' => 'medications',
                'en' => 'Medications',
                'ar' => 'الأدوية'
            ],
            [
                'app' => '1',
                'key' => 'search_medications',
                'en' => 'Search Medications',
                'ar' => 'البحث عن الأدوية'
            ],
            [
                'app' => '1',
                'key' => 'buy_now',
                'en' => 'Buy now',
                'ar' => 'اشتري الآن'
            ],

            // MEDICATION PAGE
            [
                'app' => '1',
                'key' => 'delivery_cost',
                'en' => 'Delivery Cost',
                'ar' => 'تكلفة التوصيل'
            ],
            [
                'app' => '1',
                'key' => 'based_address',
                'en' => 'Based on your address',
                'ar' => 'بناء على عنوانك'
            ],
            [
                'app' => '1',
                'key' => 'change_address',
                'en' => 'Change Address',
                'ar' => 'تغيير العنوان'
            ],
            [
                'app' => '1',
                'key' => 'pharmacies_list',
                'en' => 'Pharmacies list',
                'ar' => 'قائمة الصيدليات'
            ],
            [
                'app' => '1',
                'key' => 'order',
                'en' => 'Order',
                'ar' => 'طلب'
            ],
            [
                'app' => '1',
                'key' => 'add_cart',
                'en' => 'Add to cart',
                'ar' => 'اضف إلى العربة'
            ],
            [
                'app' => '1',
                'key' => 'reviews',
                'en' => 'Reviews',
                'ar' => 'التعليقات'
            ],
            [
                'app' => '1',
                'key' => 'le',
                'en' => 'LE',
                'ar' => 'ج.م.'
            ],

            // APPOINTMENTS
            [
                'app' => '1',
                'key' => 'all',
                'en' => 'All',
                'ar' => 'الكل'
            ],
            [
                'app' => '1',
                'key' => 'booking',
                'en' => 'Booking',
                'ar' => 'الحجز'
            ],
            [
                'app' => '1',
                'key' => 'call_up',
                'en' => 'Call up',
                'ar' => 'الإستدعاء'
            ],
            [
                'app' => '1',
                'key' => 're_exam',
                'en' => 'Re-Examination',
                'ar' => 'اعادة الكشف'
            ],
            [
                'app' => '1',
                'key' => 'booking',
                'en' => 'Booking',
                'ar' => 'الحجز'
            ],

            // NOTIFICATIONS
            [
                'app' => '1',
                'key' => 'sent_you',
                'en' => 'sent you a',
                'ar' => 'ارسل اليك'
            ],
            [
                'app' => '1',
                'key' => 'prescription',
                'en' => 'prescription',
                'ar' => 'روشتة'
            ]

            // END OF LOCALIZATION
        ]);

        $this->command->info('    ---------------------------------------');
        $this->command->info('     Localization table updated ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
