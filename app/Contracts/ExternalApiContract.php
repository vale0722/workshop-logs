<?php

namespace App\Contracts;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface ExternalApiContract
{
    public function getItems(Request $request): Collection;
    public function transResponse(Collection $items): array;
}
