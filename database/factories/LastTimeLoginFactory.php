<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LastTimeLogin;
use App\User;
use Faker\Generator as Faker;

$factory->define(LastTimeLogin::class, function (Faker $faker) {
    return [
      	'last_time' => now(),
      	'ip' => 'N/A',
    ];
});
