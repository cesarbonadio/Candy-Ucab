<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            'nombre'=>'required|max:40',
            'descripcion'=>'max:400',
            'precio'=>'required|numeric',
            'ranking'=>'nullable|integer',
            'foto'=>'max:70',
            'fk_tipo'=>'nullable|integer'
        ];
    }
}
