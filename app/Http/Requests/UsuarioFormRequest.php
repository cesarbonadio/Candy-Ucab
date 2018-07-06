<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'username'=>'required|max:20',
            'password'=>'required|max:20',
            'fk_rol'=>'required|integer',
            'fk_juridico'=>'nullable|max:40',
            'fk_naturale'=>'nullable|integer',
            'fk_empleado'=>'nullable|integer'
        ];
    }
}
