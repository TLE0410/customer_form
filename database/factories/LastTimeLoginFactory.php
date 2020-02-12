<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LastTimeLogin;
use Faker\Generator as Faker;

$factory->define(LastTimeLogin::class, function (Faker $faker) {
    return [
      	'user_id',
      	'last_time',
      	'ip',
    ];
});
