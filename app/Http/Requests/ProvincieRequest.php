<?php

namespace App\Http\Requests;

use JetBrains\PhpStorm\ArrayShape;

class ProvincieRequest extends BaseRequest
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
                'name' => 'required|string|unique:provincies,name',
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

    /**
     * @return string[]
     */
    #[ArrayShape(['name' => 'string', 'id' => 'string'])]
    public function attributes(): array
    {
        return [
            'name' => 'provincies',
            'id' => 'identicador',
        ];
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['required' => 'string', 'unique' => 'string'])]
    public function messages(): array
    {
        return [
            'required' => 'El campo :attributes obligatorio',
            'unique' => 'El campo :attributes debe ser único',
        ];
    }
}
