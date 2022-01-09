<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaRequest extends FormRequest
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
            'concepto'  => 'required',
            'fecha_venta'   => 'nullable|date|date_format:Y-m-d',
            'cliente_id'    => 'required|numeric',
            'estado'        => 'nullable|numeric'
        ];
    }
}
