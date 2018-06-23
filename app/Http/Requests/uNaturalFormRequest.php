<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class uNaturalFormRequest extends FormRequest
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
        $rules = [
            'cedula'=>'required|integer|unique:naturale,cedula',
            'rif'=>'required|max:40|unique:naturale,rif',
            'correo'=>'required|max:40|unique:naturale,correo',
            'nombre'=>'required|max:40',
            'apellido'=>'required|max:40',
            'fk_lugar'=>'required|integer',
            'fk_tienda'=>'integer',
            'num_carnet'=>'max:50',
            'user'=>'required|max:20|unique:usuario,username',
            'pass'=>'required|max:20',
            'telefono'=>'nullable|max:15|unique:telefono,valor',
            'tipo_telefono'=>'nullable|max:15'
        ];


        if ($this->natural){
          $rules['cedula'] ='required|integer|unique:naturale,cedula,'.$this->natural.',cedula';
          $rules['rif']='required|max:40|unique:naturale,rif,'.$this->natural.',cedula';
          $rules['correo']='required|max:40|unique:naturale,correo,'.$this->natural.',cedula';
        }

       return $rules;
    }

}
