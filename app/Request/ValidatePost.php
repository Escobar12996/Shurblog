<?php


namespace App\Request;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidatePost extends FormRequest
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
            'tittle' => ['required', 'string', 'min:8'],
            'body' => ['required', 'string', 'min:400'],
        ];
    }


    //No es necesario porque hemos añadidio el lang es

    public function messages()
    {
        return [
            'tittle.required' => 'Debes introducir un titulo',
            'tittle.min' => 'Debe de tener mas de 8 caracteres',
            'body.required' => 'Debes introducir una noticia',
            'body.min' => 'Debe de tener mas de 400 caracteres',
        ];
    }
}
