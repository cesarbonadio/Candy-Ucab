<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Diario_DescuentoFormRequest extends FormRequest
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
            'c_diario'=>'required|integer',
            'c_descuento'=>'required|integer'
        ];
    }
}
