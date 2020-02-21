<?php


namespace App\Request;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidationFormUserData extends FormRequest
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
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'user' => ['required', 'string', 'min:3', Rule::unique('users')->ignore($this->user()->id)]
        ];
    }


    //No es necesario porque hemos añadidio el lang es

    public function messages()
    {
        return [
            'name.required' => 'Debes introducir un nombre',
            'name.min' => 'El nombre debe tener 4 carácteres como mínimo',
            'email.required' => 'Debes introducir un correo',
            'email.max' => 'El correo no puede ser tan largo',
            'image.required' => 'Debes poner una imagen',
            'image.min' => 'Debes poner una imagen',
            'user.required' => 'Debes introducir un usuario',
            'user.min' => 'El usuario no puede ser tan corto',
        ];
    }
}
