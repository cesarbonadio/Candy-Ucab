<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class uUsuarioFormRequest extends FormRequest
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
                'username'=>'required|max:20|unique:usuario,username',
                'password'=>'required|max:20',
                'fk_juridico'=>'max:40',
                'fk_naturale'=>'integer',
        ];
    }
}
