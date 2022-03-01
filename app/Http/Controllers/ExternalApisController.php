<?php

namespace App\Http\Controllers;

use App\Contracts\ExternalApiContract;

class ExternalApisController extends Controller
{
    public function index(string $api)
    {
        $service = resolve(ExternalApiContract::class, ['api' => $api]);
        $items = $service->getItems();
        return view('externals.index', compact('items'));
    }
}
