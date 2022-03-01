<?php

namespace App\ExternalApis;

use App\Contracts\ExternalApiContract;
use App\Responses\ItemApiResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Marvel implements ExternalApiContract
{
    protected string $url;
    protected string $username;
    protected string $password;

    public function __construct(array $settings)
    {
        $this->url = $settings['url'];
        $this->username = $settings['username'];
        $this->password = $settings['password'];
    }

    public function getItems(): Collection
    {
        $ts = now()->timestamp;
        $response = Http::get($this->url, [
            'apikey' => $this->username,
            'ts' => $ts,
            'hash' => md5($ts . $this->password . $this->username),
        ]);

        if ($response->ok()) {
            return $this->formatItems($response->collect('data.results'));
        } else {
            throw new \Exception('La api no funcionó');
        }
    }

    public function formatItems(Collection $items): Collection
    {
        return $items->map(function ($item) {
            $id = Arr::get($item, 'id');
            $name = Arr::get($item, 'name');
            $description = Arr::get($item, 'description');
            $thumbnail = Arr::get($item, 'thumbnail');
            $image = Arr::get($thumbnail, 'path') . '.' . Arr::get($thumbnail, 'extension');
            return new ItemApiResponse($id, $name, $description, $image);
        });
    }
}
