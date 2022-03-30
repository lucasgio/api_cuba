<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\NeighborhoodActions;
use App\Http\Controllers\ApiController;
use App\Http\Requests\NeighborhoodRequest;
use App\Http\Resources\NeighborhoodResource;
use App\Models\Neighborhoods;
use App\Traits\InfoResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/*use Illuminate\Http\Request;*/
/**
 * @group Neighborhood
 *
 * Endpoint create and list neighborhood
 */
class NeighborhoodsController extends ApiController
{
    use InfoResponse;

    /**
     * Resource to get all neighborhoods
     *
     * @group Neighborhood
     *
     * @apiResource App\Http\Resources\NeighborhoodResource
     * @apiResourceModel App\Models\Neighborhoods
     *
     *
     * @queryParam page int The number of page.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $neighborhood = NeighborhoodResource::collection(Neighborhoods::paginate(10));

        return $this->collectionDataResponse($neighborhood);
    }

    /**
     * Resource to store a single neighborhood
     *
     * @group Neighborhood
     *
     * @response status=200
     *  {
     *     {
     *          "data": {
     *              "name": "Belen",
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
     *            "El campo barrio o consejo popular debe ser único"
     *         ],
     *         "message": "Los parámetros no son válidos"
     *      }
     * }
     *
     * @bodyParam name string required
     * @bodyParam municipalitie_id int required
     * @param NeighborhoodRequest $request
     * @return JsonResponse
     */
    public function store(NeighborhoodRequest $request): JsonResponse
    {
        $neighborhood = Neighborhoods::create($request->validated());

        return $this->singleDataResponse($this->resourceSuccess(), $neighborhood, 201);
    }

    /**
     * Resource to store a lot of municipalities
     *
     * @group Neighborhood
     *
     * @response status=200
     *  {
     *     {
     *       "data": true,
     *       "message": "El recurso se ha creado correctamente"
     *     }
     *  }
     *
     * @response status=422 scenario="Unprocessable Content"
     * {
     *    {
     *      "message": "Entrada duplicada"
     *    }
     * }
     *
     * @bodyParam municipalitie_id int ID of municipalities
     * @bodyParam name string[] required
     *
     * @param Request $request
     * @param NeighborhoodActions $neighborhoodActions
     * @return JsonResponse
     */
    public function storeMassive(Request $request, NeighborhoodActions $neighborhoodActions): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'municipalitie_id' => 'nullable|int',
            'name' => 'required|array',
        ]);

        if ($validator->fails()) {
            return $this->singleDataResponse($this->error(), $validator->errors()->all(), 422);
        }

        $resp = $neighborhoodActions->handler($request);

        return $this->singleDataResponse($this->resourceSuccess(), $resp, 201);
    }
}
