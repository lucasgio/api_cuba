<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

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
     * @return array|Arrayable|\JsonSerializable
     */
    #[ArrayShape([
        'id' => "mixed",
        'barrio' => "mixed",
        'municipio' => "\App\Http\Resources\MunicipalitiesResource",
        'provincia' => "\App\Http\Resources\MunicipalitiesResource"
    ])] public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'barrio' => $this->name,
            'municipio' => MunicipalitiesResource::make($this->municipalities),
        ];
    }
}
