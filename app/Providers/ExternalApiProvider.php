<?php

namespace App\Providers;

use App\Contracts\ExternalApiContract;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class ExternalApiProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(ExternalApiContract::class, function ($app, $data) {
            $apiData = config('externals.api');
            $current = Arr::get($data, 'api');
            $service = $apiData['services'][$current];
            $serviceClass = $service['class'];
            $settings = $service['settings'] ?? [];

            return new $serviceClass($settings);
        });
    }
}
