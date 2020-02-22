<?php

use Faker\Generator as Faker;

$factory->define(SpkApp\Spk::class, function (Faker $faker) {
    return [
        'nama' => $faker->sentence(),
        'jenis_bobot_id' => $faker->randomElement([1, 2]),
        'ket' => $faker->sentence(),
    ];
});
