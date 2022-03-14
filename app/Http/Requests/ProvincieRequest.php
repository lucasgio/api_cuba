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
                'name' => 'required|unique:provincies,name'
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

            'name' => 'provincia',
            'id' => 'identificador'

        ];
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['required' => 'string', 'unique' => 'string'])]
    public function messages(): array
    {
        return [

            'required' => 'El campo :attribute es obligatorio',
            'unique' => 'El campo :attribute debe ser único'

        ];
    }
}
