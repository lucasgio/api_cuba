<?php

namespace App\Actions;

use App\Http\Controllers\ApiController;
use App\Models\Municipality;
use App\Models\Neighborhoods;
use App\Traits\InfoResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NeighborhoodActions extends ApiController
{
    use InfoResponse;

    /**
     * @param $request
     * @return JsonResponse|Exception|bool
     */
    public function handler($request): JsonResponse|Exception|bool
    {
        try {
            $municipality = $request->name;
            foreach ($municipality as $value) {
                Neighborhoods::create([
                    'municipalitie_id' => $request->municipalitie_id,
                    'name' => $value,
                ]);
            }
            DB::commit();
            DB::rollback();
        } catch (Exception $e) {
            abort(422, 'Entrada duplicada');
        }

        return true;
    }
}
