<?php

namespace App\Http\Controllers;

use App\Contracts\ExternalApiContract;
use Illuminate\Http\Request;

class ExternalApiController extends Controller
{
    public function index(Request $request, ExternalApiContract $externalApi)
    {
        $items = $externalApi->transResponse($externalApi->getItems($request));

        return view('externals.index', compact('items'));
    }
}
