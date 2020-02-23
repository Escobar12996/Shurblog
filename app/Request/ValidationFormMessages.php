<?php


namespace App\Request;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidationFormMessages extends FormRequest
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
            'message' => ['required', 'string', 'min:8'],
        ];
    }


    //No es necesario porque hemos añadidio el lang es

    public function messages()
    {
        return [
            'message.required' => 'Debes introducir un mensaje',
            'message.min' => 'El mensaje tiene que tener al menos 8 letras...',
        ];
    }
}
