<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface ExternalApiContract
{
    public function getItems(): Collection;
    public function formatItems(Collection $items): Collection;
}
