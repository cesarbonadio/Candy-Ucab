<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NaturalFormRequest extends FormRequest
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

      /*
      Estos nombres nada tienen que ver con el nombre
      de cada atributo de la tabla, estos nombres estan asociados
      al nombre de los formularios a nivel de vista para
      ingresar los datos en la base de datos
      */


        $rules = [
            'cedula'=>'required|integer|unique:naturale,cedula',
            'rif'=>'required|max:40|unique:naturale,rif',
            'correo'=>'required|max:40|unique:naturale,correo',
            'nombre'=>'required|max:40',
            'apellido'=>'required|max:40',
            'fk_lugar'=>'required|integer',
            'fk_tienda'=>'nullable',
            'num_carnet'=>'nullable|max:50',

             /*telefono y tipo_telefono no son atributos de la tabla, pero ahora
               es parte del formulario, por eso se coloca en las reglas*/
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
