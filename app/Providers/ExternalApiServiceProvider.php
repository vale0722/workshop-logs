<?php

namespace App\Providers;

use App\Contracts\ExternalApiContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ExternalApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(ExternalApiContract::class, function ($app) {
            $apiData = config('externals.api');
            $service = $apiData['service'];
            $serviceClass = $apiData[$service]['class'];
            $settings = $apiData[$service]['settings'] ?? [];

            return new $serviceClass($settings);
        });
    }
}
