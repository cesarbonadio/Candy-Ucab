<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedioFormRequest extends FormRequest
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
          'tipo'=>'required|max:10',
          'num'=>'required|integer',
          'marca_tarjeta'=>'nullable|string|max:20',
          'fk_juridico'=>'nullable|string|max:40',
          'fk_naturale'=>'nullable|integer'
        ];
    }
}
