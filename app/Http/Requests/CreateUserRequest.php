<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email' => [
                'required', 'email'
            ],
            'movil' => [
                'numeric', 'required'
            ]
        ];
    }

    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email ya existe',
            'email.email' => 'Debe ser un formato de email valido',
            'movil.required' => 'El movil es requerido',
            'movil.numeric' => 'Debes introducir valores numericos'
        ];
    }
}

