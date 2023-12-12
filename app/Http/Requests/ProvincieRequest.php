<?php

namespace App\Http\Requests;

use JetBrains\PhpStorm\ArrayShape;

class ProvincieRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return match ($this->method()) {
            'GET' => [],
            'POST' => [
                'name' => 'required|unique:provincies,name',
            ],
            'PUT' => [
                'id' => 'required|int|exists:provincies,id',
                'name' => 'nullable|string|unique:provincies,name',
            ],
            'DELETE' => [
                'id' => 'required|int|exists:provincies,id',
            ]
        };
    }

    public function attributes(): array
    {
        return [

            'name' => 'provincia',
            'id' => 'identificador',

        ];
    }

    public function messages(): array
    {
        return [

            'required' => 'El campo :attribute es obligatorio',
            'unique' => 'El campo :attribute debe ser único',

        ];
    }
}
