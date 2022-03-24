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
