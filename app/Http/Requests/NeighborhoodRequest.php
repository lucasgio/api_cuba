<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class NeighborhoodRequest extends BaseRequest
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
                'name' => 'required|string|unique:neighborhoods,name',
                'municipalitie_id' => 'required|int|exists:municipalities,id',
            ],
            'PUT' => [
                'id' => 'required|int|exists:neighborhoods,id',
                'name' => 'nullable|string|unique:neighborhoods,name',
                'municipalitie_id' => 'nullable|int|exists:municipalities,id',
            ],
            'DELETE' => [
                'id' => 'required|int|exists:neighborhoods,id',
            ]
        };
    }

    /**
     * @return string[]
     */
    #[ArrayShape([
        'name' => 'string',
        'municipalitie_id' => 'string',
    ])]
 public function attributes(): array
 {
     return [
         'name' => 'barrio o consejo popular',
         'municipalitie_id' => 'municipio',
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
         'exists' => 'El campo :attribute no existe en el sistema',
         'unique' => 'El campo :attribute debe ser único',
     ];
 }
}
