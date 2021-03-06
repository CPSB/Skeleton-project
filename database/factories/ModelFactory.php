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
$factory->define(ActivismeBE\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(ActivismeBE\Role::class, function (Faker\Generator $faker) {
    return ['name' => $faker->word];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(ActivismeBE\Permission::class, function (Faker\Generator $faker) {
    return ['name' => $faker->word];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(ActivismeBE\Contact::class, function (Faker\Generator $faker) {
    return [
        'read_by' => function () {
            return factory(ActivismeBE\User::class)->id;
        },
        'is_read' => 'N',
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'subject' => $faker->sentence,
        'message' => $faker->sentences(3)
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $faker */
$factory->define(ActivismeBE\SingleSupport::class, function (Faker\Generator $faker) {
   return [

   ];
});