<?php

namespace App\Actions;

use App\Http\Controllers\ApiController;
use App\Models\Provincie;
use App\Traits\InfoResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProvinciesActions extends ApiController
{
    use InfoResponse;

    public function handler($request): JsonResponse|Exception|bool
    {
        try {
            $provincies = $request->name;
            foreach ($provincies as $value) {
                Provincie::create([
                    'name' => $value,
                ]);
            }
            DB::commit();
            DB::rollback();
        } catch (\Exception $e) {
            abort(422, 'Entrada duplicada');
        }

        return true;
    }
}
