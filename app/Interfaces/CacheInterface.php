<?php

namespace App\Interfaces;

use Illuminate\Support\Facades\Cache;

interface CacheInterface
{
    public function rememberCache(int $timer);

}
