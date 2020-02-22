<?php


namespace App\Request;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidationFormUserPass extends FormRequest
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
            'passwordv' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
        ];
    }


    //No es necesario porque hemos añadidio el lang es

    public function messages()
    {
        return [
            'passwordv.required' => 'Debes introducir la contraseña antigua',
            'password.required' => 'Debes introducir una contraseña',
            'password.min' => 'Debe de tener mas de 8 letras',
            'password.confirmed' => 'Debes de volver a introducir la contraseña',
        ];
    }
}
