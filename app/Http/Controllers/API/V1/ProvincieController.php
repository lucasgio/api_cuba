<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\ProvincieRequest;
use App\Http\Resources\ProvinciesResource;
use App\Models\Provincie;
use App\Traits\InfoResponse;
use Illuminate\Http\JsonResponse;
/*use Illuminate\Http\Request;*/

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
     * Store a newly created resource in storage.
     *
     * @param ProvincieRequest $request
     * @return JsonResponse
     */
    public function store(ProvincieRequest $request): JsonResponse
    {
        $provincies = Provincie::create($request->validated());
        return $this->singleDataResponse($this->resourceSuccess,$provincies,201);
    }

    /**
     * Display the specified resource.
     *
     * @param Provincie $provincie
     * @return JsonResponse
     */
    public function show(Provincie $provincie): JsonResponse
    {
        $provincies = ProvinciesResource::make($provincie);
        return $this->singleDataResponse($this->resourceList,$provincies,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProvincieRequest $request
     * @param Provincie $provincie
     * @return JsonResponse
     */
    public function update(ProvincieRequest $request, Provincie $provincie): JsonResponse
    {
        $provincies = $provincie->update($request->validated());
        return $this->singleDataResponse($this->resourceUpdate,$provincies,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Provincie $provincie
     * @return JsonResponse
     */
    public function destroy(Provincie $provincie): JsonResponse
    {
        $provincies = $provincie->delete();
        return $this->singleDataResponse($this->resourceDelete,$provincies,200);
    }
}
