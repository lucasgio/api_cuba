<?php

namespace App\Actions;

use App\Http\Resources\ProvinciesResource;
use App\Models\Information;
use App\Models\Provincie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class InformationActions
{
    private int $timer = 3600;

    private int $pagination = 10;

    public function handler(Request $request): void
    {
        Information::create([
            'ip' => $request->getClientIp(),
            'method' => $request->getMethod(),
        ]);

    }
}
