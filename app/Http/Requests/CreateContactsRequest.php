<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactsRequest extends FormRequest
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
            'name' => [
                'required','string','min:4'
            ],
            'surnames' => [
                'required','string','min:4'
            ],
            'address' => [
                'required','string','min:4'
            ],
            'movil' => [
                'required','numeric','min:6'
            ],
            'email' => [
                'required','email'
            ],
            'notes' => [
                'string','nullable','min:4'
            ],
        ];
    }

    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe estar solo compuesto por letras',
            'name.min' => 'El nombre debe tener minimo 4 letras',
            'surnames.required' => 'Los apellidos son requeridos',
            'surnames.string' => 'Los apellidos deben estar solo compuestos por letras',
            'surnames.min' => 'El surnames debe tener minimo 4 letras',
            'address.required' => 'La direccion es requerida',
            'address.string' => 'La direccion debe estar compuesta por letras y numeros',
            'address.min' => 'El address debe tener minimo 4 letras',
            'email.required' => 'El email es requerido',
            'email.email' => 'Debes introducir un email correcto',
            'movil.required' => 'El numero de movil es requerido',
            'movil.numeric' => 'El numero movil debe estar compuesta solo por numeros',
            'movil.min' => 'El campo movil debe tener minimo 6 numeros',
            'notes.string' => 'Las notas sobre el cliente deben estar compuesta por letras o letras y numeros',
            'notes.min' => 'El campo notes debe tener minimo 4 caracteres',


        ];
    }
}
