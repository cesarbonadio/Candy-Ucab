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
      /*validar reglas a nivel de formulario*/
      /*
      Estos nombres nada tienen que ver con el nombre
      de cada atributo de la tabla, estos nombres estan asociados
      al nombre de los formularios a nivel de vista para
      ingresar los datos en la base de datos
      */
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
