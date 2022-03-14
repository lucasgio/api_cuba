<?php

namespace App\Http\Requests;

use JetBrains\PhpStorm\ArrayShape;

class MunicipalityRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => [
                'name' => 'required|string|unique:municipalities,name',
                'provincie_id' => 'nullable|int|exists:provincies,id',
            ],
            'PUT' => [
                'id' => 'required|int|exists:municipalities,id',
                'name' => 'nullable|string|unique:municipalities,name',
                'provincie_id' => 'nullable|int|exists:provincies,id',
            ],
            'DELETE' => [
                'id' => 'required|int|exists:municipalities,id',
            ]
        };
    }

    /**
     * @return string[]
     */
    #[ArrayShape([
        'name' => 'string',
        'provincie_id' => 'string',
    ])]
    public function attributes(): array
    {
        return [
            'name' => 'municipio',
            'provincie_id' => 'provincia',
        ];
    }

    /**
     * @return string[]
     */
    #[ArrayShape([
        'required' => 'string',
        'exists' => 'string',
        'unique' => 'string',
    ])]
    public function messages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio',
            'exists' => 'El campo :attribute no existe en la api',
            'unique' => 'El campo :attribute debe ser único',
        ];
    }
}
