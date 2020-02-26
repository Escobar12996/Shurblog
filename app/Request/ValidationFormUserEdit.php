<?php


namespace App\Request;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidationFormUserEdit extends FormRequest
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
            'user' => ['required', 'string', 'min:3', Rule::unique('users')]
        ];
    }


    //No es necesario porque hemos añadidio el lang es

    public function messages()
    {
        return [
            'user.required' => 'Debes introducir un usuario',
            'user.min' => 'El usuario no puede ser tan corto',
        ];
    }
}
