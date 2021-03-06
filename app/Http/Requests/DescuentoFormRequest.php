<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DescuentoFormRequest extends FormRequest
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
            'porcentaje'=>'required|integer',
            'descripcion'=>'required|max:200',
            'fk_producto'=>'nullable|integer',
        ];
    }

}
