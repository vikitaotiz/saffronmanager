<?php

use Faker\Generator as Faker;

$factory->define(App\Department::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Accounting', 'Operations', 'Sales and Marketing', 'Administration', 'Transport', 'Maintenance']),
        'description' => $faker->sentence(50),
        'user_id' => $faker->numberBetween($min=1, $max=10),
    ];
});
