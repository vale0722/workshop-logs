<?php

return [
  'api' => [
      'service' => env('EXTERNAL_API', 'rick-and-morty'),
      'rick-and-morty' => [
         'class' => \App\ExternalApis\RickAndMorty::class,
         'settings' => [],
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
];
