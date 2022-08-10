<?php

namespace App\Services;

use App\Http\Resources\ProvinciesResource;
use App\Interfaces\CacheInterface;
use App\Models\Provincie;
use Illuminate\Support\Facades\Cache;

class CacheProvinces implements CacheInterface
{
    public function rememberCache(int $timer)
    {
        return  Cache::remember('provinces', $timer, fn () => ProvinciesResource::collection(Provincie::all()));
    }
}
