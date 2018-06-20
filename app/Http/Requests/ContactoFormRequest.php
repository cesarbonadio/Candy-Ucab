<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoFormRequest extends FormRequest
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
    public function rules() {

        $rules = [
          'cedula'=>'required|integer|unique:contacto,cedula',
          'nombre'=>'required|max:40',
          'apellido'=>'required|max:40',
          'funcion'=>'required|max:20',
          'fk_juridico'=>'required|max:40'
        ];

        if ($this->contacto){
           $rules['fk_juridico'] = 'nullable';
           $rules['cedula'] = 'required|integer';
        }


        return $rules;
    }

}
