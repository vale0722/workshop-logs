<?php

namespace App\ExternalApis;

use App\Contracts\ExternalApiContract;
use App\Responses\ItemResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class RickAndMorty implements ExternalApiContract
{
    public function getItems(Request $request): Collection
    {
        $response = Http::get('https://rickandmortyapi.com/api/character/');

        $results = Arr::get(json_decode($response->body(), true), 'results');
        return collect($results);
    }

    public function transResponse(Collection $items): array
    {
        return $items->map(function ($item) {
            return new ItemResponse($item['name'], $item['gender'] . ' ' . $item['species'], $item['image']);
        })->toArray();
    }
}
