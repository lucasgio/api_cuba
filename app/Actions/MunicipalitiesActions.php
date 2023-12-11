<?php

namespace App\Actions;

use App\Http\Controllers\ApiController;
use App\Models\Municipality;
use App\Traits\InfoResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MunicipalitiesActions extends ApiController
{
    use InfoResponse;

    /**
     * @param $request
     * @return JsonResponse|Exception|bool
     */
    public function handler($request): JsonResponse|Exception|bool
    {
        try {
            foreach ($request as $municipality) {
                foreach ($municipality['name'] as $item) {
                    Municipality::create([
                        'provincie_id' => $municipality['provincie_id'],
                        'name' => $item,
                    ]);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            return abort(422, 'Ha ocurrido un error temporal');
        }

        return true;
    }
}
