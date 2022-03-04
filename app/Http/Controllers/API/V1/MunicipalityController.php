<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\MunicipalityRequest;
use App\Http\Resources\MunicipalitiesResource;
use App\Models\Municipality;
use App\Traits\InfoResponse;
use Illuminate\Http\JsonResponse;
/*use Illuminate\Http\Request;*/

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

    /**
     * Store a newly created resource in storage.
     *
     * @param MunicipalityRequest $request
     * @return JsonResponse
     */
    public function store(MunicipalityRequest $request): JsonResponse
    {
        $municipalities = Municipality::create($request->validated());
        return $this->singleDataResponse($this->resourceSuccess,$municipalities,201);
    }

    /**
     * Display the specified resource.
     *
     * @param Municipality $municipality
     * @return JsonResponse
     */
    public function show(Municipality $municipality): JsonResponse
    {
        $municipalities = MunicipalitiesResource::make($municipality);
        return $this->singleDataResponse($this->resourceList,$municipalities,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MunicipalityRequest $request
     * @param Municipality $municipality
     * @return JsonResponse
     */
    public function update(MunicipalityRequest $request, Municipality $municipality): JsonResponse
    {
        $municipalities = $municipality->update($request->validated());
        return $this->singleDataResponse($this->resourceUpdate,$municipalities,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Municipality $municipality
     * @return JsonResponse
     */
    public function destroy(Municipality $municipality): JsonResponse
    {
        $municipalities = $municipality->delete();
        return $this->singleDataResponse($this->resourceDelete,$municipalities,200);
    }
}
