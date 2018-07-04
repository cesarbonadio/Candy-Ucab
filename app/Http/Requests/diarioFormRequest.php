<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class diarioFormRequest extends FormRequest
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
            'descripcion'=>'required|max:600',
            'fecha_emision'=>'required|date_format:Y-m-d H:i:s',
            'fecha_vencimiento'=>'required|date_format:Y-m-d H:i:s'
        ];
    }
}
