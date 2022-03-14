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

/*use Illuminate\Http\Request;*/



 /**
 *  @group  Provincias
 *
 *  Listado de las provincias
 *
 *
 *
 * @apiResource status 200 {
 *
 *    "data": [
 *           {
 *               "id": 17,
 *               "name": "La Habana"
 *           }
 *      ],
 *
 *     "paginate": {
 *           "current_page": 1,
 *           "last_page": 1,
 *           "per_page": 10,
 *           "total": 1
 *       },
 *           "message": "1 registros listados correctamente"
 *       }
 *
 */



class ProvincieController extends ApiController
{

    use InfoResponse;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $provincies = ProvinciesResource::collection(Provincie::paginate(10));
        return $this->collectionDataResponse($provincies);
    }


    /**
     * @param ProvincieRequest $request
     * @return JsonResponse
     */
    public function store(ProvincieRequest $request): JsonResponse
    {
        $provincies = Provincie::create($request->validated());
        return $this->singleDataResponse($this->resourceSuccess,$provincies,201);
    }


    /**
     * @param Request $request
     * @param ProvinciesActions $provinciesActions
     * @return JsonResponse
     * @throws Exception
     */
    public function storeMassive(Request $request,ProvinciesActions $provinciesActions): JsonResponse
    {

        $resp = $provinciesActions->handler($request);
        return $this->singleDataResponse($this->resourceSuccess,$resp,201);
    }

/*    public function show(Provincie $provincie): JsonResponse
    {
        $provincies = ProvinciesResource::make($provincie);
        return $this->singleDataResponse($this->resourceList,$provincies,200);
    }

    public function update(ProvincieRequest $request, Provincie $provincie): JsonResponse
    {
        $provincies = $provincie->update($request->validated());
        return $this->singleDataResponse($this->resourceUpdate,$provincies,201);
    }


    public function destroy(Provincie $provincie): JsonResponse
    {
        $provincies = $provincie->delete();
        return $this->singleDataResponse($this->resourceDelete,$provincies,200);
    }*/
}
