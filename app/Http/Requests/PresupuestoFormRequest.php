<?php

namespace candyucab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresupuestoFormRequest extends FormRequest
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
          'tienda_descontar'=>'required|integer|exists:tienda,codigo', //la tienda de la que se va a descontar la cantidad pedida
          'producto1'=>'nullable|integer|exists:producto,codigo|required_with:cantidad1',
          'producto2'=>'nullable|integer|exists:producto,codigo|required_with:cantidad2',
          'producto3'=>'nullable|integer|exists:producto,codigo|required_with:cantidad3',
          'producto4'=>'nullable|integer|exists:producto,codigo|required_with:cantidad4',
          'producto5'=>'nullable|integer|exists:producto,codigo|required_with:cantidad5',
          'cantidad1'=>'nullable|numeric|required_with:producto1',
          'cantidad2'=>'nullable|numeric|required_with:producto2',
          'cantidad3'=>'nullable|numeric|required_with:producto3',
          'cantidad4'=>'nullable|numeric|required_with:producto4',
          'cantidad5'=>'nullable|numeric|required_with:producto5'
      ];


      if ($this->presupuesto){
        $rules['tienda_descontar'] = 'nullable';
        $rules['fk_juridico'] = 'nullable';
        $rules['fk_naturale'] = 'nullable';
      }

 return $rules;

    }

}
