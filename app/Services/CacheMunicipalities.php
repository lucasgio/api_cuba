<?php

namespace App\Services;

use App\Http\Resources\MunicipalitiesResource;
use App\Interfaces\CacheInterface;
use App\Models\Municipality;
use Illuminate\Support\Facades\Cache;


class  CacheMunicipalities implements CacheInterface
{

    public function rememberCache(int $timer)
    {
        return Cache::remember('municipalities', $timer, fn() => MunicipalitiesResource::collection(Municipality::all()));
    }
}
