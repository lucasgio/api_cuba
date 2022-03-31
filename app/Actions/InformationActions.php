<?php

namespace App\Actions;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationActions
{
    public function handler(Request $request)
    {
        Information::create([
            'ip' => $request->getClientIp(),
            'method' => $request->getMethod(),
        ]);
    }
}
