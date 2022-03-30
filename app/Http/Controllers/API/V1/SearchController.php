<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\NeighborhoodResource;
use App\Http\Resources\ProvinciesResource;
use App\Models\Municipality;
use App\Models\Neighborhoods;
use App\Models\Provincie;
use App\Traits\InfoResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class SearchController extends ApiController
{
    use InfoResponse;

    /**
     * @group Search
     *
     * Resource to search for the municipalities of a province
     *
     * @response status=200{
     *  "data": [
     *    {
     *      "id": 1,
     *      "name": "Arroyo Naranjo"
     *    },
     *    {
     *      "id": 2,
     *      "name": "Boyeros"
     *    },
     *    {
     *      "id": 3,
     *      "name": "Centro Habana"
     *    },
     *    {
     *      "id": 4,
     *      "name": "Cerro"
     *    },
     *
     *   ],
     *    "paginate": {
     *      "current_page": 1,
     *      "last_page": 1,
     *      "per_page": 15,
     *      "total": 15
     *    },
     *    "message": "15 de registros listados correctamente"
     * }
     *
     * @queryParam filter[provincie.name] string Name of the province to search
     * @queryParam filter[provincie_id] int ID of the province to search
     * @param Request $request
     * @return JsonResponse
     */
    public function getMunicipalitiesByProvinces(Request $request): JsonResponse
    {
        $data = ProvinciesResource::collection(
            QueryBuilder::for(Municipality::class)
                ->allowedFilters(['provincie_id', 'provincie.name'])
                ->with('provincie')
                ->paginate($request->pagination == 'off'
                    ? Municipality::all()->count()
                    : config('app.number_items_pagination')
                )
        );

        return $this->collectionDataResponse($data);
    }

    /**
     * @group Search
     *
     * Resource to search for the neighborhoods of a municipality
     * Note: This resource will be gradually implemented
     *
     * @response status=200{
     *  "data": [
     *    {
     *      "id": 1,
     *      "name": "Belen"
     *    },
     *    {
     *      "id": 2,
     *      "name": "Sitios"
     *    },
     *    {
     *      "id": 3,
     *      "name": "Jesus Maria"
     *    },
     *    {
     *      "id": 4,
     *      "name": "Atarei"
     *    },
     *
     *   ],
     *    "paginate": {
     *      "current_page": 1,
     *      "last_page": 1,
     *      "per_page": 15,
     *      "total": 15
     *    },
     *    "message": "15 de registros listados correctamente"
     * }
     *
     * @queryParam filter[provincie.name] string Name of the province to search
     * @queryParam filter[provincie_id] int ID of the province to search
     * @param Request $request
     * @return JsonResponse
     */
    public function getNeighborhoodByMunicipality(Request $request): JsonResponse
    {
        $data = NeighborhoodResource::collection(
            QueryBuilder::for(Neighborhoods::class)
                ->allowedFilters(['municipalitie_id', 'municipality.name'])
                ->with('municipality')
                ->paginate($request->pagination == 'off'
                    ? Neighborhoods::all()->count()
                    : config('app.number_items_pagination')
                )
        );

        return $this->collectionDataResponse($data);
    }
}
