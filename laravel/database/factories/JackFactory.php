<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Post::class, function (Faker $faker) {
  return [
    'title' => 'Title: ' . str_random(10),
    'content' => "This is my content for test by auto fill",
  ];
});

$factory->define(App\Barberservice::class, function (Faker $faker) {
  //  ob_start();
  //  var_dump($faker);
  //  $result = ob_get_clean();
  return [
    'name' => 'style1',
    'image' => 'http://silvercitybarber.co.uk/wp-content/uploads/2017/04/Fotolia_135351230_Subscription_Monthly_M-1618x1080.jpg',
    'price' => 1234,
    'duration' => 1,
  ];
});