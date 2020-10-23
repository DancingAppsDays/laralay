<?php



/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;


$factory->define(App\Area::class, function (Faker $faker) {
    //static $password;

    return [
        //'nombre' => $faker->name,  //text(15),
        //'lastcheck' => $faker->date//address,//text(20),
        //'riskfactor' =>$faker->randomDigit   
          //({min:1,max:100})  //{$min=1,$max=100}) //($nbMaxDecimals= 2,$min=1,$max=100)   //number_format(2)
        //'password' => $password ?: $password = bcrypt('secret'),
        //'remember_token' => str_random(10),

    ];
});
