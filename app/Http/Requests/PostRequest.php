<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        return true; //alteradd para true porque nao faz validar nada no authorize por enquanto
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         =>  'required',
            'description'   =>  'required|min:5',
            'content'       =>  'required',
            'thumb'         =>  'required|image',
            'categories'    =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'required'      =>  'Este campo é obrigatório',
            'min'           =>  'Sua descrição deverá conter pelo menos :min caracter(es)',
            'image'         =>  'Imagem inválida'
        ];
    }
}
