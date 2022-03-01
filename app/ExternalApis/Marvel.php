<?php

namespace App\ExternalApis;

use App\Contracts\ExternalApiContract;
use App\Responses\ItemResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Marvel implements ExternalApiContract
{
    protected string $url;
    protected string $publicKey;
    protected string $privateKey;

    public function __construct(array $settings)
    {
        $this->url = $settings['url'];
        $this->publicKey = $settings['username'];
        $this->privateKey = $settings['password'];
    }

    public function getItems(Request $request): Collection
    {
        $timestamp = now()->getTimestamp();
        $response = Http::get($this->url, [
            'ts' => $timestamp,
            'apikey' => $this->publicKey,
            'hash' => md5($timestamp . $this->privateKey . $this->publicKey),
        ]);

        $results = Arr::get(json_decode($response->body(), true), 'data.results');

        return collect($results);
    }

    public function transResponse(Collection $items): array
    {
        return $items->map(function ($item) {
            return new ItemResponse($item['name'], $item['description'], $item['thumbnail']['path'] . '.' . $item['thumbnail']['extension']);
        })->toArray();
    }
}
