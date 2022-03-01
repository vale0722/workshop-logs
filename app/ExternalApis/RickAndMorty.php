<?php

namespace App\ExternalApis;

use App\Contracts\ExternalApiContract;
use App\Responses\ItemApiResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class RickAndMorty implements ExternalApiContract
{
    protected string $url;

    public function __construct(array $settings)
    {
        $this->url = $settings['url'];
    }

    public function getItems(): Collection
    {
        $response = Http::get($this->url);

        if ($response->ok()) {
            return $this->formatItems($response->collect('results'));
        } else {
            throw new \Exception('La api no funcionó');
        }
    }

    public function formatItems(Collection $items): Collection
    {
        return $items->map(function ($item) {
            $id = Arr::get($item, 'id');
            $name = Arr::get($item, 'name');
            $description = Arr::get($item, 'gender') . ' ' . Arr::get($item, 'species') . ' ' . Arr::get($item, 'status');
            $image = Arr::get($item, 'image');
            return new ItemApiResponse($id, $name, $description, $image);
        });
    }
}
