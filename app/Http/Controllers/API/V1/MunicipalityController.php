<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\MunicipalitiesActions;
use App\Http\Controllers\ApiController;
use App\Http\Requests\MunicipalityRequest;
use App\Http\Resources\MunicipalitiesResource;
use App\Models\Municipality;
use App\Traits\InfoResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/*use Illuminate\Http\Request;*/

/**
 *  @group Municipios
 *
 *  Listado de los muncipios
 *
 *
 * @apiResource  status 200 {
 *  "data": [
 *     {
 *       "id": 9,
 *       "name": "Guanabacoa",
 *       "provincia": {
 *          "id": 17,
 *          "name": "La Habana"
 *       }
 *    }
 *   ],
 *   "paginate": {
 *      "current_page": 1,
 *      "last_page": 1,
 *      "per_page": 10,
 *      "total": 1
 *   },
 *   "message": "1 registros listados correctamente"
 *   }
 */
class MunicipalityController extends ApiController
{
    use InfoResponse;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $municipalities = MunicipalitiesResource::collection(Municipality::paginate(10));

        return $this->collectionDataResponse($municipalities);
    }

    /*    public function store(MunicipalityRequest $request): JsonResponse
        {
            $municipalities = Municipality::create($request->validated());
            return $this->singleDataResponse($this->resourceSuccess(),$municipalities,201);
        }

    /**
     * @param MunicipalityRequest $request
     * @return JsonResponse
     */
    public function store(MunicipalityRequest $request): JsonResponse
    {
        $municipalities = Municipality::create($request->validated());

        return $this->singleDataResponse($this->resourceSuccess(), $municipalities, 201);
    }

    /**
     * @param Request $request
     * @param MunicipalitiesActions $municipalitiesActions
     * @return JsonResponse
     */
    public function storeMassive(Request $request, MunicipalitiesActions $municipalitiesActions): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'provincie_id' => 'nullable|int',
            'name' => 'required|array',
        ]);

        if ($validator->fails()) {
            return $this->singleDataResponse($this->error(), $validator->errors()->all(), 422);
        }

        $resp = $municipalitiesActions->handler($request);

        return $this->singleDataResponse($this->resourceSuccess(), $resp, 201);
    }

    /*    public function show(Municipality $municipality): JsonResponse
        {
            $municipalities = MunicipalitiesResource::make($municipality);
            return $this->singleDataResponse($this->resourceList,$municipalities,200);
        }


            public function show(Municipality $municipality): JsonResponse
            {
                $municipalities = MunicipalitiesResource::make($municipality);
                return $this->singleDataResponse($this->resourceList(),$municipalities,200);
            }


            public function update(MunicipalityRequest $request, Municipality $municipality): JsonResponse
            {
                $municipalities = $municipality->update($request->validated());
                return $this->singleDataResponse($this->resourceUpdate(),$municipalities,201);
            }


            public function destroy(Municipality $municipality): JsonResponse
            {
                $municipalities = $municipality->delete();
                return $this->singleDataResponse($this->resourceDelete(),$municipalities,200);
            }*/
}
