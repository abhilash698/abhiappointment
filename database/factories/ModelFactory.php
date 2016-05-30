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

$factory->defineAs(App\User::class, 'admin', function ($faker) {
    return [
        'name' => 'AdminShaksii',
        'mobile' => '9440684283',
        'email' => 'admin@shakshii.com',
        'password' => bcrypt('secret'),
        'branch_id' => '2',
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'mobile' => $faker->phoneNumber,
        'age' => $faker->numberBetween($min = 20, $max = 45),
        'sex' => 'Male',
        'email' => $faker->safeEmail,
        'address' => $faker->streetAddress,
        'notes' => '',
        'branch_id' => '2'
    ];
});

$factory->define(App\Appointment::class, function (Faker\Generator $faker) {
    return [
        'branch_id' => '2',
        'user_id' => '1',
        'service_id' => '3',
        'appointment_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now'),
        'priority' => $faker->randomElement($array = ['high', 'medium','low'])
    ];
});