<?php

namespace App\Actions;

use App\Http\Controllers\ApiController;
use App\Models\Provincie;
use App\Traits\InfoResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProvinciesActions extends ApiController
{
    use InfoResponse;

    public function handler($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|array',
        ]);

        if ($validator->fails()) {
            return $this->singleDataResponse($this->error, $validator->errors()->all(), 422);
        }

        try {
            $provincies = $request->name;
            foreach ($provincies as $value) {
                Provincie::create([
                    'name' => $value,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return $e;
        }

        return true;
    }
}
