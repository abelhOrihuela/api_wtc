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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => 'BIT TECH S.A. de C.V.',
        'description' => 'Leading people ...'
    ];
});

$factory->define(App\Token::class, function (Faker\Generator $faker) {
    return [
        'token' => $faker->isbn13,
        'email' => 'abelorihuelamendoza@hotmail.com',
        'company_id' => 1
    ];
});
