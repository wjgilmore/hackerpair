<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name'           => 'Laravel and Coffee',
        'published'      => 1,
        'start_date'     => '2017-12-01',
        'start_time'     => '15:00:00',
        'max_attendees'  => 3,
        'venue'          => 'City Coffee Shop',
        'city'           => 'Dublin',
        'description'    => "Let's drink coffee and learn Laravel together!"
    ];
});

$factory->state(App\Event::class, 'incorrect_capitalization', [
    'name' => 'have fun WITH the raspberry pi',
]);

