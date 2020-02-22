<?php

use Faker\Generator as Faker;

$factory->define(SpkApp\JenisBobot::class, function (Faker $faker) {
    return [
        'nama' => $faker->randomElement(['Preferensi', 'Persen']),
    ];
});
