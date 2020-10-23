<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;


$factory->define(App\equip::class, function (Faker $faker) {
    //static $password;

    return [
        'nombre' => $faker->text(15),  //name,
        'lastcheck' => $faker->date,//address,//text(20),
        'riskfactor' =>$faker->randomDigit   
          //({min:1,max:100})  //{$min=1,$max=100}) //($nbMaxDecimals= 2,$min=1,$max=100)   //number_format(2)
        //'password' => $password ?: $password = bcrypt('secret'),
        //'remember_token' => str_random(10),

    ];
});
