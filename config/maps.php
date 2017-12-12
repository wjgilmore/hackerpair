<?php

use Http\Client\Curl\Client;
use Geocoder\Provider\Chain\Chain;
use Geocoder\Provider\GoogleMaps\GoogleMaps;

return [
    'cache-duration' => 999999999,
    'providers' => [
        Chain::class => [
            GoogleMaps::class => [
                'en-US',
                env('GOOGLE_MAPS_API_KEY'),
            ],
        ],
        GoogleMaps::class => [
            'us',
            env('GOOGLE_MAPS_API_KEY'),
        ],
    ],
    'adapter'  => Client::class,
];
