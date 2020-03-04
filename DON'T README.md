   COMMON PROBLEMS AND RESOLUTIONS
-------------------------------------
-> Seeding shows error, not found
   Solution : composer dump-autoload, then run php artisan db:seed

-> Arrays should be like this $array[]

-> use (&& , ||) not (and, or)

-> Adding the faker service provider for the medications
   Here's how:

      Navigate to the root dir of your Laravel project

      Install the library: composer require --dev mbezhanov/faker-provider-collection

      Create a new service provider for Faker (either php artisan make:provider FakerServiceProvider or touch ./app/Providers/FakerServiceProvider.php

      In ./app/Providers/FakerServiceProvider.php paste the following code:



      <?php

      namespace App\Providers;

      use Bezhanov\Faker\ProviderCollectionHelper;
      use Faker\Factory;
      use Faker\Generator;
      use Illuminate\Support\ServiceProvider;

      class FakerServiceProvider extends ServiceProvider
      {
         public function register()
         {
            $this->app->singleton(Generator::class, function () {
                  $faker = Factory::create();
                  ProviderCollectionHelper::addAllProvidersTo($faker);

                  return $faker;
            });
         }
      }



      Finally, register the new provider with your application, by adding App\Providers\FakerServiceProvider::class, to the providers array in ./config/app.php

      You should now be able to use the all the extra providers bundled with this library in your Model Factories, e.g.



      <?php

      // ./database/factories/UserFactory.php

      use Faker\Generator as Faker;

      $factory->define(App\User::class, function (Faker $faker) {
         return [
            'name' => $faker->name,
            'university' => $faker->university,
            'sport' => $faker->sport,
            'team' => $faker->team,
         ];
      });



->	In Heroku, to make faker work
	In composer.json change faker from require-dev to require
   Then run composer update

-> To make the app work on the server
   Before pushing to the server, open config\database.php
   uncomment the line "'default' => env('DB_CONNECTION', 'pgsql'),"
   and comment the line "'default' => env('DB_CONNECTION', 'mysql'),"
   and if you want to go back to work offline, vice versa ..