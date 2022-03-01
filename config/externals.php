<?php

return [
  'api' => [
      'current' => env('EXTERNAL_API', 'rick-and-morty'),
      'services' => [
        'rick-and-morty' => [
            'class' => \App\ExternalApis\RickAndMorty::class,
            'settings' => [
                'url' => env('RAM_URL'),
            ],
        ],
        'marvel' => [
            'class' => \App\ExternalApis\Marvel::class,
            'settings' => [
                'url' => env('MARVEL_URL'),
                'username' => env('MARVEL_USERNAME'),
                'password' => env('MARVEL_PASSWORD'),
            ],
        ],
      ],
  ],
];
