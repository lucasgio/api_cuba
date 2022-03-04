<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\NeighborhoodRequest;
use App\Http\Resources\NeighborhoodResource;
use App\Models\Neighborhoods;
use App\Traits\InfoResponse;
use Illuminate\Http\JsonResponse;
/*use Illuminate\Http\Request;*/


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

    /**
     * Store a newly created resource in storage.
     *
     * @param NeighborhoodRequest $request
     * @return JsonResponse
     */
    public function store(NeighborhoodRequest $request): JsonResponse
    {
        $neighborhood = Neighborhoods::create($request->validated());
        return $this->singleDataResponse($this->resourceSuccess,$neighborhood,201);
    }

    /**
     * Display the specified resource.
     *
     * @param Neighborhoods $neighborhoods
     * @return JsonResponse
     */
    public function show(Neighborhoods $neighborhoods): JsonResponse
    {
        $neighborhood = NeighborhoodResource::make($neighborhoods);
        return $this->singleDataResponse($this->resourceList,$neighborhood,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NeighborhoodRequest $request
     * @param Neighborhoods $neighborhoods
     * @return JsonResponse
     */
    public function update(NeighborhoodRequest $request, Neighborhoods $neighborhoods): JsonResponse
    {
        $neighborhood = $neighborhoods->update($request->validated());
        return $this->singleDataResponse($this->resourceUpdate,$neighborhood,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Neighborhoods $neighborhoods
     * @return JsonResponse
     */
    public function destroy(Neighborhoods $neighborhoods): JsonResponse
    {
        $neighborhood = $neighborhoods->delete();
        return $this->singleDataResponse($this->resourceDelete,$neighborhood,200);
    }
}
