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

$factory->define(App\User::class, function (Faker $faker) {
    
    //static $password;

    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        //'password' => $password ?: $password = bcrypt('secret'),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    
    return [
        'categoryName' => $faker->word,
        'categoryDescription' => $faker->text,
        'publicationStatus' => $faker->boolean,
    ];
});

$factory->define(App\SubCategory::class, function (Faker $faker) {
    $min = 0; $max = 0;
    return [
        'subCategoryName' => $faker->word,
        'categoryId' => $faker->numberBetween($min = 0, $max = 4),
        'subCategoryDescription' => $faker->text,
        'publicationStatus' => $faker->boolean,
    ];
});