<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\InformationActions;
use App\Actions\MunicipalitiesActions;
use App\Actions\NeighborhoodActions;
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
 * @group Municipality
 *
 * Endpoint create and list municipality
 */
class MunicipalityController extends ApiController
{
    use InfoResponse;

    /**
     * Resource to get all municipalities
     *
     * @group Municipality
     *
     * @apiResource App\Http\Resources\MunicipalitiesResource
     * @apiResourceModel App\Models\Municipality
     *
     *
     * @queryParam page int The page number
     * @param Request $request
     * @param InformationActions $informationActions
     * @return JsonResponse
     */
    public function index(Request $request, InformationActions $informationActions): JsonResponse
    {
        $informationActions->handler($request);
        $municipalities = MunicipalitiesResource::collection(Municipality::paginate(10));

        return $this->collectionDataResponse($municipalities);
    }

    /**
     * Resource to store single municipality
     *
     * @group Municipality
     *
     * @response status=200
     *  {
     *     {
     *          "data": {
     *              "name": "Habana Vieja",
     *              "updated_at": "2022-03-24T14:45:53.000000Z",
     *              "created_at": "2022-03-24T14:45:53.000000Z",
     *              "id": 36
     *          },
     *          "message": "El recurso se ha creado correctamente"
     *     }
     *  }
     *
     * @response status=422 scenario="Unprocessable Content"
     * {
     *      {
     *         "errors": [
     *            "El campo municipio debe ser único"
     *         ],
     *         "message": "Los parámetros no son válidos"
     *      }
     * }
     * @bodyParam name string required
     * @bodyParam provincie_id int
     * @param MunicipalityRequest $request
     * @param InformationActions $informationActions
     * @return JsonResponse
     */
    public function store(MunicipalityRequest $request, InformationActions $informationActions): JsonResponse
    {
        $informationActions->handler($request);
        $municipalities = Municipality::create($request->validated());

        return $this->singleDataResponse($this->resourceSuccess(), $municipalities, 201);
    }

    /**
     * Resource to store a lot of municipalities
     *
     * @group Municipality
     *
     * @response status=200
     *  {
     *     {
     *       "data": true,
     *       "message": "El recurso se ha creado correctamente"
     *     }
     *  }
     *
     * @response status=422 scenario=Unprocessable Content
     * {
     *    {
     *      "message": "Entrada duplicada"
     *    }
     * }
     * @bodyParam name string[] required
     * @bodyParam provincie_id int ID of province
     * @param Request $request
     * @param MunicipalitiesActions $municipalitiesActions
     * @return JsonResponse
     */
    public function storeMassive(Request $request, MunicipalitiesActions $municipalitiesActions): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|array',
            'provincie_id' => 'nullable|int|exists:provincies,id',
        ]);

        if ($validator->fails()) {
            return $this->singleDataResponse($this->error(), $validator->errors()->all(), 422);
        }

        $resp = $municipalitiesActions->handler($request);

        return $this->singleDataResponse($this->resourceSuccess(), $resp, 201);
    }
}
