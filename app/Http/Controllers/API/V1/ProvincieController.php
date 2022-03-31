<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\ProvinciesActions;
use App\Http\Controllers\ApiController;
use App\Http\Requests\ProvincieRequest;
use App\Http\Resources\ProvinciesResource;
use App\Models\Provincie;
use App\Traits\InfoResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * @group Province
 *
 * Endpoint create and list provinces
 */
class ProvincieController extends ApiController
{
    use InfoResponse;

    /**
     * Display a listing of the resource.
     *
     * @group Province
     *
     * @response status=200 {
     *
     *  "data": [
     *      {
     *          "id": 4,
     *          "name": "Pinar del Rio"
     *      },
     *      {
     *          "id": 5,
     *          "name": "La Habana"
     *      },
     *      {
     *          "id": 6,
     *          "name": "Santiago de Cuba"
     *      }
     *  ],
     *  "paginate": {
     *     "current_page": 1,
     *     "last_page": 1,
     *     "per_page": 10,
     *     "total": 3
     *  },
     *  "message": "3 de registros listados correctamente"
     * }
     *
     *
     * @queryParam page int The page number. Example: /api/v1/provincies?page=2
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $provincies = ProvinciesResource::collection(Provincie::paginate(10));

        return $this->collectionDataResponse($provincies);
    }

    /**
     * Resource to store a single province
     *
     * @group Province
     *
     * @response status=200
     * {
     *     {
     *          "data": {
     *              "name": "La Habana",
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
     *            "El campo provincia debe ser único"
     *         ],
     *         "message": "Los parámetros no son válidos"
     *      }
     *  }
     *
     * @bodyParam name string required
     * @param ProvincieRequest $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $provincies = Provincie::create($request->validated());

        return $this->singleDataResponse($this->resourceSuccess(), $provincies, 201);
    }

    /**
     * Resource to store multiples provinces
     *
     * @group Province
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
     * @bodyParam name string[] required
     * @param Request $request
     * @param ProvinciesActions $provinciesActions
     * @return JsonResponse
     */
    public function storeMassive(Request $request, ProvinciesActions $provinciesActions): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|array',
        ]);

        if ($validator->fails()) {
            return $this->singleDataResponse($this->error(), $validator->errors()->all(), 422);
        }

        $resp = $provinciesActions->handler($request);

        return $this->singleDataResponse($this->resourceSuccess(), $resp, 201);
    }
}
