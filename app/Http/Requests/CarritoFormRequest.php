<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarritoFormRequest extends FormRequest
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
         'fk_juridico'=>'nullable|string|max:40|exists:juridico,rif',
         'fk_naturale'=>'nullable|integer|exists:naturale,cedula',
         'producto'=>'nullable|integer|exists:producto,codigo|required_with:cantidad',
         'cantidad'=>'nullable|numeric|required_with:producto'
     ];
     if ($this->presupuesto){
       $rules['tienda_descontar'] = 'nullable';
       $rules['fk_juridico'] = 'nullable';
       $rules['fk_naturale'] = 'nullable';
     }
return $rules;
    }

}
