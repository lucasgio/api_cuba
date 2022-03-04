<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\NeighborhoodRequest;
use App\Http\Resources\NeighborhoodResource;
use App\Models\Neighborhoods;
use App\Traits\InfoResponse;
use Illuminate\Http\JsonResponse;
/*use Illuminate\Http\Request;*/

/**
 *
 * @group Barrios o Consejos Populares
 *
 *  Este endpoint estara disponible en versiones posteriores
 *
 *  Listado de los barrios o consejos populares
 *
 *
 * @apiResource  status 200 {
 *  "data": [
 *     {
 *          "id": 5,
 *          "barrio": "Belen",
 *          "municipio": {
 *              "id": 9,
 *              "name": "Guanabacoa",
 *              "provincia": {
 *                  "id": 17,
 *                  "name": "La Habana"
 *              }
 *          }
 *     }
 *   ],
 *   "paginate": {
 *      "current_page": 1,
 *      "last_page": 1,
 *      "per_page": 10,
 *      "total": 1
 *   },
 *     "message": "1 registros listados correctamente"
 *   }
 *
 *
 */



class NeighborhoodsController extends ApiController
{
    use InfoResponse;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $neighborhood = NeighborhoodResource::collection(Neighborhoods::paginate(10));
        return $this->collectionDataResponse($neighborhood);
    }


/*    public function store(NeighborhoodRequest $request): JsonResponse
    {
        $neighborhood = Neighborhoods::create($request->validated());
        return $this->singleDataResponse($this->resourceSuccess,$neighborhood,201);
    }


    public function show(Neighborhoods $neighborhoods): JsonResponse
    {
        $neighborhood = NeighborhoodResource::make($neighborhoods);
        return $this->singleDataResponse($this->resourceList,$neighborhood,200);
    }


    public function update(NeighborhoodRequest $request, Neighborhoods $neighborhoods): JsonResponse
    {
        $neighborhood = $neighborhoods->update($request->validated());
        return $this->singleDataResponse($this->resourceUpdate,$neighborhood,201);
    }


    public function destroy(Neighborhoods $neighborhoods): JsonResponse
    {
        $neighborhood = $neighborhoods->delete();
        return $this->singleDataResponse($this->resourceDelete,$neighborhood,200);
    }*/
}
