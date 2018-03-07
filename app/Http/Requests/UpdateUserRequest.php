<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $path = $this->path();

        if (strpos($path, 'data')){
            $rules = [
                'name' => 'nullable|string|max:15|min:4',
                'surnames' => 'nullable|string|max:30|min:4',
                'movil' => 'nullable|numeric|min:6',
                'sector' => 'nullable|string|min:4',
                'website' => 'nullable|string|min:4'
            ];
        }elseif (strpos($path, 'password')){
            $rules = [
                'current_password' => 'required|string|min:6',
                'password' => 'required|string|min:6|confirmed',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.min' => 'El nombre debe tener minimo 4 caracteres',
            'name.max' => 'El nombre debe tener maximo 15 caracteres',
            'surnames.string' => 'El nombre debe ser una cadena de texto',
            'surnames.min' => 'El nombre debe tener minimo 4 caracteres',
            'surnames.max' => 'El nombre debe tener maximo 30 caracteres',
            'movil.min' => 'El movil es debe tener minimo 6 caracteres',
            'movil.numeric' => 'Debes introducir valores numericos',
            'sector.string' => 'El sector debe ser una cadena de texto',
            'sector.min' => 'El nombre debe tener minimo 4 caracteres',
            'website.string' => 'La website debe ser una cadena de texto',
            'website.min' => 'La website debe tener minimo 4 caracteres',
            'current_password.required' => 'La Contraseña es requerida',
            'current_password.min' => 'La Contraseña debe tener al menos 6 caracteres',
            'password.required' => 'La Contraseña es requerida',
            'password.min' => 'La Contraseña debe tener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden'


        ];
    }
}
