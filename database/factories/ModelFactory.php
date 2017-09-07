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
        'email' => 'admin@wtc-talent.com',
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text
    ];
});

$factory->define(App\Token::class, function (Faker\Generator $faker) {
    return [
        'token' => $faker->isbn13,
        'email' => 'abelorihuelamendoza@hotmail.com',
        'company_id' => 1
    ];
});
//
$factory->define(App\QuestionCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => 'General'
    ];
});

$factory->define(App\WorkArea::class, function (Faker\Generator $faker) {
    return [
        'description' => 'Marketing'
    ];
});

$factory->define(App\EducationalLevel::class, function (Faker\Generator $faker) {
    return [
        'description' => 'Licenciatura'
    ];
});




//
$factory->define(App\QuestionCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => 'General'
    ];
});
//
// $factory->define(App\QuestionCategory::class, function (Faker\Generator $faker) {
//     return [
//         'name' => 'Trabajo'
//     ];
// });
//
// $factory->define(App\QuestionCategory::class, function (Faker\Generator $faker) {
//     return [
//         'name' => 'Oportunidades'
//     ];
// });
//
// $factory->define(App\QuestionCategory::class, function (Faker\Generator $faker) {
//     return [
//         'name' => 'Calidad de Vida'
//     ];
// });

// $factory->define(App\QuestionCategory::class, function (Faker\Generator $faker) {
//     return [
//         'name' => 'Practicas de la Compañia'
//     ];
// });

// $factory->define(App\QuestionCategory::class, function (Faker\Generator $faker) {
//     return [
//         'name' => 'Retribucion Total'
//     ];
// });

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        'question' => $faker->text,
        'description' => $faker->name
    ];
});
