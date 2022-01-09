<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'    => 'required',
            'descripcion'   => 'nullable',
            'tipo'  => 'required|numeric',
            'costo' => 'nullable|numeric',
            'precio'        => 'required|numeric',
            'almacenable'   => 'nullable|numeric',
            'vendible'      => 'nullable|numeric',
            'comprable'     => 'nullable|numeric',
        ];
    }
}
