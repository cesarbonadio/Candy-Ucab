<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use candyucab\Providers\Validator;

class JuridicoFormRequest extends FormRequest
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
          'rif'=>'required|max:40|unique:juridico,rif',
          'correo'=>'required|max:40|unique:juridico,correo',
          'd_social'=>'required|max:50',
          'r_social'=>'required|max:50',
          'pagina_web'=>'max:40|unique:juridico,pagina_web',
          'capital'=>'required|numeric',
          'fk_lugar'=>'required|integer',
          'fk_lugar_fiscal'=>'required|integer',
          'fk_tienda'=>'integer',
          'num_carnet'=>'max:50'
      ];


     if ($this->juridico){
        $rules['rif'] = 'required|max:40|unique:juridico,rif,'.$this->juridico.',rif';
        $rules['correo'] = 'required|max:40|unique:juridico,correo,'.$this->juridico.',rif';
        $rules['pagina_web'] = 'required|max:40|unique:juridico,pagina_web,'.$this->juridico.',rif';
     }

      return $rules;
  }


}
