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

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'notation' => strtoupper(substr($faker->name, 0, 3))
    ];
});

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'image' => $faker->image,
        'title' => $faker->company,
        'subtitle' => $faker->companySuffix,
        'isbn' => $faker->isbn13,
        'number_of_pages' => $faker->randomDigitNotNull,
        'resume' => $faker->text
    ];
});

$factory->define(App\Dictionary::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->company,
        'subtitle' => $faker->companySuffix,
        'edition' => $faker->word,
        'classification' => $faker->text
    ];
});


