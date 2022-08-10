<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;
use JsonSerializable;

/**
 * @property mixed $name
 * @property mixed $id
 */
class NeighborhoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    #[ArrayShape([
        'id' => 'mixed',
        'name_neighborhood' => 'mixed',
        'name_municipality' => "\App\Http\Resources\MunicipalitiesResource",
    ])]
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'name_neighborhood' => $this->name,
            'name_municipality' => MunicipalitiesResource::make($this->whenLoaded('municipalities')),
        ];
    }
}
